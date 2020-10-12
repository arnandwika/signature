<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Signs;
use App\User;
use App\Assign;
use App\DataTables\SignsDataTable;
use Illuminate\Support\Facades\Storage;
use DB;

class SignsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    // public function downloadFile($file_name){
    //     return view('signs.show')->with('file', $file_name);
        
    // }

    public function history(){
        $user = auth()->user()->id;
        $signs = DB::select('SELECT * from signs INNER JOIN assigns on signs.id = assigns.post_id where assigns.assigned_id = '.$user.' AND assigns.status = 2');
        return view('signs.history')->with('signs', $signs);
    }

    public function cancel($id){
        $assigned_id = auth()->user()->id;
        $assign = Assign::where('post_id', $id)->where('assigned_id', $assigned_id)->first();
        $new_status = $assign->status-1;
        $assign->update([
            'status' => $new_status
        ]);

        return redirect('/home')->with('success', 'Your status reverted');
    }

    public function fetchSearch(){
        $output = '';
        $users = User::all();
        foreach ($users as $user) {
            $output .= '<option value="'.$user['id'].'">'.$user['name'].'</option>';
        }
        echo $output;
    }

    public function downloadingFile($id){
        $sign = Signs::find($id);

        $check = 0;
        $assigns = Assign::all()->where('post_id', $sign->id);
        if(count($assigns)>0){
            foreach($assigns as $assign){
                if($assign->status == 1 && $assign->assigned_id !== auth()->user()->id){
                    $check = 0;
                    return redirect('/home')->with('error', 'File is still being reviewed by another user');
                }
                if($assign->status == 2 && $assign->assigned_id !== auth()->user()->id){
                    $check = 1;
                }
            }
        }

        $assign = Assign::where('post_id', $sign->id)->where('assigned_id', auth()->user()->id)->first();
        if(!is_null($assign)){
            $assign->update([
                'status' => 1
            ]);
        }
        if($check == 0){
            return response()->download('storage/pdf_files/'.$sign->file_name);
        }else if($check == 1){
            return response()->download('storage/signed_files/'.$sign->file_name);
        }
        
    }

    public function downloadingOriginalFile($id){
        $sign = Signs::find($id);
        return response()->download('storage/pdf_files/'.$sign->file_name);
    }

    public function upload($id){
        $sign = Signs::find($id);
        return view('signs.upload')->with('sign', $sign);
    }
    public function uploading(Request $request, $id){
        $this->validate($request,[
            'signed_file' => 'required|mimetypes:application/pdf'
        ]);

        $sign = Signs::find($id);
        //handle file upload
        if($request->hasFile('signed_file')){
            // $filenameWithExt = $request->file('signed_file')->getClientOriginalName();
            // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // $extension = $request->file('signed_file')->getClientOriginalExtension();
            // $fileNameToStore = $filename.'.'.$extension;
            $fileNameToStore = $sign->file_name;
            $path = $request->file('signed_file')->storeAs('public/signed_files', $fileNameToStore);
        }
        // $sign = Signs::where('file_name', $filenameWithExt)->first();
        
        $assign = Assign::where('post_id', $sign->id)->where('assigned_id', auth()->user()->id)->first();
        $assign->update([
            'status' => 2
        ]);

        return redirect('/home')->with('success', 'Signed File Uploaded');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        $signs = Signs::all()->where('user_id', $user);
        $assigned_users = DB::select('SELECT * from signs INNER JOIN assigns on signs.id = assigns.post_id where signs.user_id = '.$user.'');
        $checked_red =0;
        $checked_yellow =0;
        $checked_green =0;
        // foreach ($assigned_users as $assigned_user){
        //     if($assigned_user->status == 2)
        //         $checked = 2;
        //     if($assigned_user->status == 1)
        //         $checked = 1;
        //     if($assigned_user->status == 0)
        //         $checked = 0;
        // }         
        return view('signs.index')->with('signs', $signs)->with('assigned_users', $assigned_users)->with('checked_red', $checked_red)->with('checked_yellow', $checked_yellow)->with('checked_green', $checked_green);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('name', 'asc')->get();
        return view('signs.create')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'pdf_file' => 'required|mimetypes:application/pdf',
            'description' => 'required',
            'assign' => 'required'
        ]);
        //handle file upload
        if($request->hasFile('pdf_file')){
            $filenameWithExt = $request->file('pdf_file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('pdf_file')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('pdf_file')->storeAs('public/pdf_files', $fileNameToStore);
        }

        $sign = new Signs;
        $assigned_ids = $request->input('assign');
        $index=1;
        $length = count($assigned_ids);
        $i=0;
        
        foreach($assigned_ids as $assigned_id){
            $temp_assign = $assigned_id;
            for($i=$index; $i<$length; $i++){
                if($temp_assign == $assigned_ids[$i]){
                    return redirect('/signs/create')->with('error', 'Assigned employee has the same value.');
                }
                $index++;
            }
        }
        
        $sign->description = $request->input('description');
        $sign->file_name = $fileNameToStore;
        $sign->user_id = auth()->user()->id;
        $sign->save();

        
        foreach($assigned_ids as $assigned_id){
            $assign = new Assign;
            $assign->submitter_id = auth()->user()->id;
            $assign->assigned_id = $assigned_id;
            $assign->post_id = $sign->id;
            $assign->status = 0;
            $assign->save();
        }

        
        return redirect('/signs')->with('success', 'File submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sign = Signs::find($id);
        // $assigned_ids = Assign::where('post_id', $sign->id)->first();
        $user = User::where('id', $sign->user_id)->first();
        // $assigneds = User::where('id', $assigned_ids->assigned_id)->get();
        $assigned_ids = DB::select('SELECT * from users INNER JOIN assigns on users.id = assigns.assigned_id where assigns.post_id = '.$sign->id.'');
        return view('signs.show')->with('sign', $sign)->with('user', $user)->with('assigneds', $assigned_ids);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sign = Signs::find($id);
        if(auth()->user()->id !== $sign->user_id){
            return redirect('/signs')->with('error', 'Unauthorized page');
        }

        Storage::delete('public/pdf_files/'.$sign->file_name);
        Storage::delete('public/signed_files/'.$sign->file_name);

        $sign->delete();
        return redirect('/signs')->with('success', 'Sign removed');
    }
}
