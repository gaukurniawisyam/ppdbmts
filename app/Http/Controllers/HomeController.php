<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login()
    {
        $data = [
            'title' => 'Login',
        ];
        return view('login', $data);
    }

    public function logout()
    {
        session()->flush();
        return redirect('/')->with('alert', 'Anda Telah Logout');
    }

    public function logincek(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $akun = DB::table('user')
            ->where('email', $email)
            ->where('password', $password)
            ->first();
        if ($akun) {
            session(['user' => $akun]);
            return redirect('/')->with('success', 'Login Berhasil');
        } else {
            return redirect()->back()->with('error', 'Anda gagal login, Email atau password salah');
        }
    }

    public function loginadmin()
    {
        $data = [
            'title' => 'Login Admin',
        ];
        return view('loginadmin', $data);
    }

    public function loginadmincek(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $akun = DB::table('admin')
            ->where('email', $email)
            ->where('password', $password)
            ->first();
        if ($akun) {
            session(['admin' => $akun]);
            return redirect('admin/dashboard')->with('success', 'Login Berhasil');
        } else {
            return redirect()->back()->with('error', 'Anda gagal login, Email atau password salah');
        }
    }

    public function daftar()
    {
        return view('daftar');
    }

    public function daftarsimpan(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $nohp = $request->input('nohp');

        $akun = DB::table('user')
            ->where('email', $email)
            ->first();
        if ($akun) {
            session(['admin' => $akun]);
            return redirect()->back()->with('error', 'Pendaftaran Gagal, email sudah ada');
        } else {
            DB::table('user')->insert([
                'nama' => $nama,
                'email' => $email,
                'password' => $password,
                'nohp' => $nohp,
                'alamat' => $alamat,
            ]);
            return redirect('login')->with('success', 'Pendaftaran Berhasil');
        }
    }
    public function kartuujian($userId)
    {
        // Retrieve user data
        $user = DB::table('user')->where('id', $userId)->first();
    
        // Retrieve the latest exam date
        $examDate = DB::table('tanggal_ujian')->orderBy('tanggal_ujian', 'desc')->first();
    
        return view('kartu-peserta-ujian', [
            'user' => $user,
            'examDate' => $examDate,
        ]);
    }
    
    public function daftarulang()
    {
        return view('daftarulang');
    }
    public function daftarUlangSimpan(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama' => 'required|string|max:255',
            'noujian' => 'required|numeric',
            'berkas' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Upload file
        $fileName = null;
        if ($request->hasFile('berkas')) {
            $fileName = time() . '.' . $request->berkas->extension();  
            $request->berkas->move(public_path('uploads'), $fileName);
        }

        // Simpan data ke database menggunakan query builder
        DB::table('daftarulang')->insert([
            'nama' => $request->input('nama'),
            'noujian' => $request->input('noujian'),
            'berkas' => $fileName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
    
    

    public function profil()
    {
        if (!session('user')) { 
            session()->flash('alert', 'Anda belum login. Silakan login terlebih dahulu.');
            return redirect('login'); 
        }

        $idpengguna = session('user')->id;
        $pengguna = DB::table('user')->where('id', $idpengguna)->first();

        $data = [
            'pengguna' => $pengguna,
        ];
        return view('profil', $data);
    }

    public function ubahprofil(Request $request, $id)
    {
        $password = $request->input('password');
        if (empty($password)) {
            $password = $request->input('passwordlama');
        }
        DB::table('user')
            ->where('id', $id)
            ->update([
                'password' => $password,
                'nama' => $request->input('nama'),
                'email' => $request->input('email'),
                'nohp' => $request->input('telepon'),
                'alamat' => $request->input('alamat'),
            ]);

        return redirect('profil');
    }

    public function ppdb()
    {
        $ppdb = DB::table('ppdb')->orderBy('idppdb', 'desc')->get();
        $data = [
            'title' => 'PPDB',
            'ppdb' => $ppdb
        ];
        return view('ppdb', $data);
    }

    public function ppdbdetail($id)
    {
        $ppdb = DB::table('ppdb')->where('idppdb', $id)->first();
        $data = [
            'title' => 'PPDB',
            'ppdb' => $ppdb
        ];
        return view('ppdbdetail', $data);
    }

    public function ppdbdaftar($id)
    {
        if (empty(session('user'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('login');
        }
        $iduser = session('user')->id;
        $ppdb = DB::table('ppdb')->where('idppdb', $id)->first();
        $user = DB::table('user')->where('id', $iduser)->first();
        $data = [
            'title' => 'PPDB',
            'ppdb' => $ppdb,
            'user' => $user
        ];
        return view('ppdbdaftar', $data);
    }

    public function ppdbdaftarsimpan(Request $request)
    {
        $idppdb = $request->input('idppdb');
        $iduser = $request->input('iduser');
        $nisn = $request->input('nisn');
        $nama = $request->input('nama');
        $jeniskelamin = $request->input('jeniskelamin');
        $asalsekolah = $request->input('asalsekolah');
        $tanggallahir = $request->input('tanggallahir');
        $tempatlahir = $request->input('tempatlahir');
        $alamat = $request->input('alamat');
        $kelurahan = $request->input('kelurahan');
        $kecamatan = $request->input('kecamatan');
        $kabupaten = $request->input('kabupaten');
        $provinsi = $request->input('provinsi');
        $nohp = $request->input('nohp');
        $email = $request->input('email');
        $namaayah = $request->input('namaayah');
        $pekerjaanayah = $request->input('pekerjaanayah');
        $namaibu = $request->input('namaibu');
        $pekerjaanibu = $request->input('pekerjaanibu');
        $nohportu = $request->input('nohportu');
        $namawali = $request->input('namawali');
        $pekerjaanwali = $request->input('pekerjaanwali');
        $nohpwali = $request->input('nohpwali');
        $status = "Belum Upload Berkas";
        
        DB::table('pendaftaran')->insert([
            'idppdb' => $idppdb,
            'iduser' => $iduser,
            'jeniskelamin' => $jeniskelamin,
            'asalsekolah' => $asalsekolah,
            'tempatlahir' => $tempatlahir,
            'tanggallahir' => $tanggallahir,
            'email' => $email,
            'nisn' => $nisn,
            'nama' => $nama,
            'nohp' => $nohp,
            'alamat' => $alamat,
            'kelurahan' => $kelurahan,
            'kecamatan' => $kecamatan,
            'kabupaten' => $kabupaten,
            'provinsi' => $provinsi,
            'namaayah' => $namaayah,
            'pekerjaanayah' => $pekerjaanayah,
            'namaibu' => $namaibu,
            'pekerjaanibu' => $pekerjaanibu,
            'nohportu' => $nohportu,
            'namawali' => $namawali,
            'pekerjaanwali' => $pekerjaanwali,
            'nohpwali' => $nohpwali,
            'status' => $status,
        ]);

        return redirect('riwayat')->with('success', 'Pendaftaran Berhasil');
    }
    

    public function riwayat()
    {
        if (empty(session('user'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('login');
        }
        $iduser = session('user')->id;

        $pendaftaran = DB::table('pendaftaran')->leftJoin('ppdb', 'ppdb.idppdb', '=', 'pendaftaran.idppdb')
            ->where('iduser', $iduser)->get();
        $data = [
            'title' => 'PPDB',
            'pendaftaran' => $pendaftaran
        ];
        return view('riwayat', $data);
    }
    public function tandaterima($id)
{
    // Example: Retrieve some data based on the provided ID
    $data = DB::table('pendaftaran')->where('idpendaftaran', $id)->first();

    // Example: Return a view or perform some action with the data
    return view('tandaterima', ['data' => $data]);
}

    public function riwayatdetail($id)
    {
        if (empty(session('user'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('login');
        }
        $pendaftaran = DB::table('pendaftaran')->leftJoin('ppdb', 'ppdb.idppdb', '=', 'pendaftaran.idppdb')
            ->where('idpendaftaran', $id)->first();
        $data = [
            'title' => 'PPDB',
            'pendaftaran' => $pendaftaran
        ];
        return view('riwayatdetail', $data);
    }

    public function riwayatedit($id)
    {
        if (empty(session('user'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('login');
        }
        $pendaftaran = DB::table('pendaftaran')->leftJoin('ppdb', 'ppdb.idppdb', '=', 'pendaftaran.idppdb')
        ->where('idpendaftaran', $id)->first();
        $data = [
            'title' => 'PPDB',
            'detail' => $pendaftaran
        ];
        return view('riwayatedit', $data);
    }

    public function riwayadeditsimpan(Request $request)
    {
        if (empty(session('user'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('login');
        }
    
        $idpendaftaran = $request->input('idpendaftaran');
    
        // Handle file uploads
        $kkPath = $ktpPath = $ijazahPath = null;
    
        if ($request->hasFile('kk')) {
            $kk = $request->file('kk');
            $kkPath = $kk->store('uploads/kk');
        }
        if ($request->hasFile('ktp')) {
            $ktp = $request->file('ktp');
            $ktpPath = $ktp->store('uploads/ktp');
        }
        if ($request->hasFile('ijazah')) {
            $ijazah = $request->file('ijazah');
            $ijazahPath = $ijazah->store('uploads/ijazah');
        }
    
        // Update record in the database
        DB::table('pendaftaran')->where('idpendaftaran', $idpendaftaran)->update([
            'kk' => $kkPath,
            'ktp' => $ktpPath,
            'ijazah' => $ijazahPath,
            'status' => 'Sudah Upload Berkas',
            'updated_at' => now(),
        ]);
    
        return redirect('riwayat')->with('success', 'Data berhasil disimpan!');
    }
    
    public function uploadAndUpdateStatus(Request $request)
{
    $request->validate([
        'idpendaftaran' => 'required|integer',
        'kk' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        'ktp' => 'nullable|file|mimes:jpg,png|max:2048',
        'ijazah' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
    ]);

    $pendaftaran = Pendaftaran::findOrFail($request->idpendaftaran);

    if ($request->hasFile('kk')) {
        $kk = $request->file('kk');
        $kkPath = $kk->store('uploads/kk', 'public');
        $pendaftaran->kk = $kkPath;
    }

    if ($request->hasFile('ktp')) {
        $ktp = $request->file('ktp');
        $ktpPath = $ktp->store('uploads/ktp', 'public');
        $pendaftaran->ktp = $ktpPath;
    }

    if ($request->hasFile('ijazah')) {
        $ijazah = $request->file('ijazah');
        $ijazahPath = $ijazah->store('uploads/ijazah', 'public');
        $pendaftaran->ijazah = $ijazahPath;
    }

    // Update the status
    $pendaftaran->status = 'Berkas Diterima dan Sedang Verifikasi';
    $pendaftaran->save();

    return redirect()->back()->with('feedback', 'Berkas berhasil diupload dan status diperbarui.');
}

    
}
