<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Signs;
use App\Assign;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $user_id = auth()->user()->id;
        // $user = User::find($user_id);
        // return view('home')->with('posts', $user->posts);
        $id = auth()->user()->id;
        $signs = DB::select('SELECT * from signs inner join assigns on signs.id = assigns.post_id where assigned_id = '.$id.' AND assigns.status != 2');
        return view('home')->with('signs', $signs);
    }
}
