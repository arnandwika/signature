@extends('layouts.app')

@section('content')
    <h1>It's simple!</h1>
    <hr>
    <div class="border border-info p-3" style="background-color: white">
        <div class=" text-center">
            <br>
            <h4>Digital Signature merupakan web yang digunakan untuk melakukan manajemen file pdf dalam proses pengajuan laporan ataupun proposal, dan permintaan tanda tangan</h4>
            <br>
            <h4>Berikut petunjuk penggunaan web Digital Signature:</h4>
            <br><br>
        </div>
        <div>
            <h5>Daftarkan nama karyawan dengan menekan Register yang ada pada menu diatas</h5>
            <h5>Tuliskan pada kolom yang tersedia sesuai keterangan yang ada</h5>
            <img src="/images/register.JPG" alt="no image" style="height: 13cm"></img>
            <h5>Lalu klik tombol Register sehingga akan ditampilkan halaman dashboard yang memuat file apa saja yang dikirim ke anda oleh orang lain untuk anda tanda tangani</h5>
            <h5>Anda dapat meminta orang lain untuk melakukan review dan tanda tangan kepada orang lain dengan menekan Request Signature</h5>
            <h5>Setelah anda mengisi lengkap kolom yang ada, pastikan orang yang di assign adalah orang yang berbeda-beda</h5>
        </div>
    </div>
@endsection