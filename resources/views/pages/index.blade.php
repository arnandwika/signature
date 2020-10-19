@extends('layouts.app')

@section('content')
    <h2>It's simple and easy to use!</h2>
    <hr>
    <div class="p-3">
        <div class=" text-center rounded-lg shadow-sm" style="background-color: white">
            <br>
            <h4>Digital Signature merupakan web yang digunakan untuk melakukan manajemen file pdf dalam proses pengajuan laporan ataupun proposal, dan permintaan tanda tangan</h4>
            <br>
            <h4>Berikut petunjuk penggunaan web Digital Signature:</h4>
            <br>
        </div>
    </div>
    <hr>
    <nav class="card shadow-sm" role="navigation">
        <button class="navbar-toggler text-left w-100 card-header bg-primary text-white" data-toggle="collapse" data-target="#collapseRegister">Register</button>
        <div id="collapseRegister" class="collapse p-2 row row-cols-2 text-justify">
            <div class="col">
                <h6>Daftarkan nama karyawan dengan menekan Register yang ada pada menu diatas</h6><br>
                <h6>Tuliskan pada kolom yang tersedia sesuai dengan keterangan yang ada</h6><br>
                <h6>Password minimal terdiri dari 8 karakter dan pastikan email valid</h6><br>
                <h6>Jika kolom sudah terisi semua, klik tombol Register dibawah. Seharusnya ditampilkan halaman dashboard anda yang berisi file yang telah diajukan karyawan lain untuk anda</h6>
            </div>
            <div class="col h-100">
                <img src="/images/goRegister.JPG" alt="no image" style="width : 100%"></img>
                <hr>
                <img src="/images/register.JPG" alt="no image" style="width : 100%"></img>
            </div>
        </div>
    </nav>
    <br>
    <nav class="card shadow-sm" role="navigation">
        <button class="navbar-toggler text-left w-100 card-header bg-primary text-white" data-toggle="collapse" data-target="#collapseLogin">Login</button>
        <div id="collapseLogin" class="collapse p-2 row row-cols-2 text-justify">
            <div class="col">
                <h6>Masuk menggunakan akun yang telah anda buat dengan menekan Login pada menu di atas</h6><br>
                <h6>Tuliskan pada kolom yang tersedia sesuai dengan keterangan yang ada</h6><br>
                <h6>Pastikan email dan password anda benar</h6><br>
                <h6>Jika kolom sudah terisi semua, klik tombol Login dibawah. Seharusnya pada menu diatas muncul berbagai fitur lainnya yang bisa diakses ketika sudah login</h6>
            </div>
            <div class="col h-100">
                <img src="/images/goLogin.JPG" alt="no image" style="width : 100%"></img>
                <hr>
                <img src="/images/login.JPG" alt="no image" style="width : 100%"></img>
                <hr>
                <img src="/images/newMenu.JPG" alt="no image" style="width : 100%"></img>
            </div>
        </div>
    </nav>
    <br>
    <nav class="card shadow-sm" role="navigation">
        <button class="navbar-toggler text-left w-100 card-header bg-primary text-white" data-toggle="collapse" data-target="#collapseRequest">Request Signature</button>
        <div id="collapseRequest" class="collapse p-2 row row-cols-2 text-justify">
            <div class="col">
                <h6>Upload dan ajukan file pdf anda untuk ditandatangani karyawan lainnya dengan menekan Request Signature pada menu di atas, atau tombol Request Signature yang tersedia di Dashboard</h6><br>
                <h6>Upload file pdf anda dan isi kolom yang tersedia sesuai dengan keterangan yang ada</h6><br>
                <h6>Pastikan karyawan yang ditetapkan untuk tanda tangan tidak sama</h6><br>
                <h6>Jika kolom sudah terisi semua, klik tombol Request dibawah. Seharusnya akan ditampilkan halaman File Submitted anda yang berisi file apa saja yang telah anda ajukan</h6>
            </div>
            <div class="col h-100">
                <img src="/images/goRequest.JPG" alt="no image" style="width : 100%"></img>
                <hr>
                <img src="/images/request.JPG" alt="no image" style="width : 100%"></img>
            </div>
        </div>
    </nav>
    <br>
    <nav class="card shadow-sm" role="navigation">
        <button class="navbar-toggler text-left w-100 card-header bg-primary text-white" data-toggle="collapse" data-target="#collapseFile">File Submitted</button>
        <div id="collapseFile" class="collapse p-2 row row-cols-2 text-justify">
            <div class="col">
                <h6>Lihat file apa saja yang telah anda ajukan dan mengetahui telah ditandatangan atau belum dengan menekan File Submitted pada menu di atas</h6><br>
                <h6>Anda dapat melihat detail dari file tersebut dengan menekan nama file yang tertera</h6><br>
                <h6>Status yang ditunjukan merupakan hasil prioritas dimana: </h6>
                <ul>
                    <li>jika ada yang masih <i>waiting</i> maka dimunculkan waiting</li>
                    <li>jika tidak ada yang masih <i>waiting</i>, dan ada yang masih <i>reviewing</i> maka akan dimunculkan reviewing</li>
                    <li>jika tidak ada yang masih <i>waiting</i> maupun <i>reviewing</i>, dan sudah <i>done</i> semua maka akan dimunculkan reviewing</li>
                </ul>
                <br>
                <h6>Anda dapat mengurutkan isi tabel dengan menekan salah satu judul kolom yang ada, dan anda dapat melakukan pencarian dengan mengetik di kolom search</h6>
            </div>
            <div class="col h-100">
                <img src="/images/goFile.JPG" alt="no image" style="width : 100%"></img>
                <hr>
                <img src="/images/file.JPG" alt="no image" style="width : 100%"></img>
            </div>
        </div>
    </nav>
    <br>
    <nav class="card shadow-sm" role="navigation">
        <button class="navbar-toggler text-left w-100 card-header bg-primary text-white" data-toggle="collapse" data-target="#collapseDashboard">Dashboard</button>
        <div id="collapseDashboard" class="collapse p-2 row row-cols-2 text-justify">
            <div class="col">
                <h6>Lihat file apa saja yang telah diajukan oleh karyawan lain untuk anda tandatangani dengan menekan nama akun anda, kemudian pilih Dashboard pada menu di atas</h6><br>
                <h6>Anda dapat melihat detail dari file tersebut dengan menekan tombol Detail</h6><br>
                <h6>Anda dapat upload dan mengajukan file untuk ditandatangani oleh karyawan lain dengan menekan tombol Request Signature</h6><br>
                <h6>Anda dapat mengurutkan isi tabel dengan menekan salah satu judul kolom yang ada, dan anda dapat melakukan pencarian dengan mengetik di kolom search</h6>
            </div>
            <div class="col h-100">
                <img src="/images/goDashboard.JPG" alt="no image" style="width : 100%"></img>
                <hr>
                <img src="/images/dashboard.JPG" alt="no image" style="width : 100%"></img>
            </div>
        </div>
    </nav>
    <br>
    <nav class="card shadow-sm" role="navigation">
        <button class="navbar-toggler text-left w-100 card-header bg-primary text-white" data-toggle="collapse" data-target="#collapseDetail">Detail File</button>
        <div id="collapseDetail" class="collapse p-2 row row-cols-2 text-justify">
            <div class="col">
                <h6>Akses file yang anda inginkan dapat dari halaman File Submitted maupun Dashboard</h6><br>
                <h6>Ada 5 fitur tersedia pada halaman detail ini. Fitur-fitur tersebut adalah:</h6><br>
                <ul>
                    <li>
                        <b>Download original file</b> berfungsi untuk melakukan download file asli yang belum ditandatangan oleh siapapun tanpa mengubah status
                    </li>
                    <li>
                        <b>Download file to sign</b> berfungsi untuk melakukan download file yang akan mengubah status anda dari <i>waiting</i> menjadi <i>reviewing</i>. Pastikan anda sesegera mungkinmereview file dan menandatangan kemudian melakukan upload signed file agar orang lain dapat melakukan download file tp sign
                    </li>
                    <li>
                        <b>Delete file</b> berfungsi untuk melakukan delete pada file yang hanya bisa dilakukan oleh pembuat file atau yang mengajukan file tersebut
                    </li>
                    <li>
                        <b>Revert status</b> berfungsi untuk mengembalikkan status anda ke 1 tingkat sebelumnya. Anda dapat menggunakannya jika anda melakukan kesalahan file saat upload maupun jika anda tidak bisa melakukan review secepatnya
                    </li>
                    <li>
                        <b>Upload signed file</b> berfungsi untuk melakukan upload file yang seharusnya telah anda tandatangani dan anda berstatus <i>reviewing</i> sehingga setelah upload menjadi <i>done</i>
                    </li>
                </ul>
                <h6>Di dalam tabel akan tertampilkan siapa saja yang diberikan tugas untuk menandatangani file dengan statusnya. Berikut penjelasan status yang dapat dimiliki karyawan:</h6><br>
                <ul>
                    <li>
                        <i>waiting</i> adalah status berwarna merah dimana karyawan tersebut belum sama sekali melakukan download dan mereview file yang diajukan. Karyawan tidak akan bisa melakukan revert status dan upload signed file
                    </li>
                    <li>
                        <i>reviewing</i> adalah status berwarna kuning dimana karyawan tersebut telah melakukan download file to sign dan sedang mereview file yang diajukan untuk ditandatangani. Perlu diperharikan jika ada yang berstatus ini maka karyawan lain tidak bisa menggunakan fitur download file to sign
                    </li>
                    <li>
                        <i>done</i> adalah status berwarna hijau dimana karyawan tersebut telah melakukan upload signed file
                    </li>
                </ul>
            </div>
            <div class="col h-100">
                <img src="/images/goDetail1.JPG" alt="no image" style="width : 100%"></img>
                <hr>
                <img src="/images/goDetail2.JPG" alt="no image" style="width : 100%"></img>
                <hr>
                <img src="/images/detail.JPG" alt="no image" style="width : 100%"></img>
            </div>
        </div>
    </nav>
    <br>
    <nav class="card shadow-sm" role="navigation">
        <button class="navbar-toggler text-left w-100 card-header bg-primary text-white" data-toggle="collapse" data-target="#collapseDownloadUpload">Downloading and Uploading Signed File</button>
        <div id="collapseDownloadUpload" class="collapse p-2 text-justify">
            <h6>Halaman yang perlu anda cek untuk mengetahui apakah ada karyawan yang sedang meminta tanda tangan anda adalah halam Dashboard. Klik tombol Detail pada salah satu file yang ingin anda tanda tangani duluan</h6><br>
            <h6>Pastikan tidak ada karyawan lain yang statusnya <i>reviewing</i>. Ketika ada karyawan lain yang statusnya <i>reviewing</i> maka anda harus menunggu karyawan tersebut untuk mengupload file yang telah ia tandatangani, atau melakukan revert status</h6><br>
            <h6>Anda bisa klik tombol Download File to Sign untuk melakukan proses tanda tangan dengan melakukan download file tersebut sehingga status anda sekarang menjadi reviewing</h6><br>
            <img src="/images/download&upload1.JPG" alt="no image" style="width : 100%"></img><hr><br>
            <h6>Download dan simpan file anda pada tempat yang anda inginkan, kemudian buka menggunakan aplikasi yang tersedia untuk tanda tangan (contoh: Adobe Acrobat Reader)</h6><br>
            <h6>Pada contoh ini dibuka dengan Adobe Acrobat Reader, kemudian anda bisa langsung klik tombol yang dilingkari pada gambar untuk memberikan tanda tangan</h6><br>
            <img src="/images/download&upload2.JPG" alt="no image" style="width : 100%"></img><hr><br>
            <h6>Jika anda pertama kali menggunakannya pada Adobe Acrobat Reader, maka klik Add Signature untuk menambahkan tanda tangan baru dari tombol sign</h6><br>
            <img src="/images/download&upload3.JPG" alt="no image" style="width : 100%"></img><hr><br>
            <h6>Lalu buatlah tanda tangan anda sebagaimana mestinya dengan klik tombol yang dilingkari. Jika sebelumnya sudah membuat tanda tangan bisa langsung pilih tanda tangan yang telah dibuat</h6><br>
            <img src="/images/download&upload4.JPG" alt="no image" style="width : 100%"></img><hr><br>
            <h6>Klik apply, dan taruhlah tanda tangan yang sudah anda buat pada tempat tertentu yang disediakan untuk anda tanda tangan, atau bisa melihat deskripsi atau keterangan pengajuan tanda tangan file tersebut pada halaman detail file</h6><br>
            <img src="/images/download&upload5.JPG" alt="no image" style="width : 100%"></img><hr><br>
            <h6>Anda bisa menyimpan file pdf yang telah anda tangani (tekan ctrl+s) dengan nama yang lain ataupun dengan nama yang sama</h6><br>
            <img src="/images/download&upload6.JPG" alt="no image" style="width : 100%"></img><hr><br>
            <h6>Selanjutnya anda buka kembali halaman detail file dan lakukan refresh jika status anda belum terupdate. Ketika status anda reviewing anda bisa menekan tombol Upload Signed File untuk mengupload file yang telah anda tandatangani</h6><br>
            <img src="/images/download&upload7.JPG" alt="no image" style="width : 100%"></img><hr><br>
            <h6>Pilih file yang telah anda tandatangani tadi, kemudian klik Upload</h6><br>
            <img src="/images/download&upload8.JPG" alt="no image" style="width : 100%"></img><hr><br>
            <h6>Anda telah menyelesaikan proses tanda tangan! Anda bisa melakukan cek file yang telah anda tandatangani pada menu history</h6>
        </div>
    </nav>
@endsection