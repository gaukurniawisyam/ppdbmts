<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function getAdminName(Request $request)
{
    $email = $request->input('email');
    $admin = DB::table('admin')->where('email', $email)->first();

    if ($admin) {
        return response()->json(['name' => $admin->nama]);
    } else {
        return response()->json(['name' => null], 404);
    }
}


    public function dashboard()
    {
        $data = [
            'title' => 'Selamat Datang ',
        ];
        return view('admin/index', $data);
    }

    public function logout()
    {
        session()->flush();
        return redirect('/loginadmin');
    }

    public function ppdbdaftar()
    {
        $ppdb = DB::table('ppdb')->get();
        $data = [
            'title' => 'Daftar ppdb',
            'ppdb' => $ppdb,
        ];
        return view('admin/ppdbdaftar', $data);
    }

    public function ppdbtambah()
    {
        $data = [
            'title' => 'Tambah ppdb',
        ];
        return view('admin/ppdbtambah', $data);
    }

    public function ppdbtambahsimpan(Request $request)
    {
        $fileppdb = $request->file('foto')->getClientOriginalName();
        $namafile = date('YmdHis') . $fileppdb;
        $request->file('foto')->move(public_path('foto'), $namafile);

        $judulppdb = $request->input('judulppdb');
        $deskripsippdb = addslashes($request->input('deskripsippdb'));
        $tanggalakhir = $request->input('tanggalakhir');
        $simpan = [
            'judulppdb' => $judulppdb,
            'deskripsippdb' => $deskripsippdb,
            'tanggalakhir' => $tanggalakhir,
            'fotoppdb' => $namafile,
        ];
        DB::table('ppdb')->insert($simpan);
        session()->flash('success', 'Berhasil menambahkan data!');
        return redirect('admin/ppdbdaftar');
    }

    public function ppdbedit($id)
    {
        $row = DB::table('ppdb')->where('idppdb', $id)->first();
        $data = [
            'title' => 'Edit ppdb',
            'row' => $row,
        ];
        return view('admin/ppdbedit', $data);
    }

    public function ppdbeditsimpan(Request $request, $id)
    {
        $judulppdb = $request->input('judulppdb');
        $deskripsippdb = addslashes($request->input('deskripsippdb'));
        $tanggalakhir = $request->input('tanggalakhir');
        $data = [
            'judulppdb' => $judulppdb,
            'deskripsippdb' => $deskripsippdb,
            'tanggalakhir' => $tanggalakhir,
        ];
        if ($request->hasFile('foto')) {
            $fileppdb = $request->file('foto')->getClientOriginalName();
            $namafile = date('YmdHis') . $fileppdb;
            $request->file('foto')->move(public_path('foto'), $namafile);
            $data['fotoppdb'] = $namafile;
        }
        DB::table('ppdb')->where('idppdb', $id)->update($data);
        session()->flash('success', 'Data berhasil diedit!');
        return redirect('admin/ppdbdaftar');
    }

    public function ppdbhapus($id)
    {
        DB::table('ppdb')->where('idppdb', $id)->delete();
        session()->flash('success', 'Berhasil menghapus data!');
        return redirect('admin/ppdbdaftar');
    }

    public function userdaftar()
    {
        $user = DB::table('user')->get();
        $data = [
            'title' => 'Daftar user',
            'user' => $user,
        ];
        return view('admin/userdaftar', $data);
    }

    public function usertambah()
    {
        $data = [
            'title' => 'Tambah user',
        ];
        return view('admin/usertambah', $data);
    }
    public function tanggalUjian()
    {
        $examDateRecord = DB::table('tanggal_ujian')->first();
        $isDateSet = $examDateRecord ? true : false;
        $tanggalujian = $isDateSet ? $examDateRecord->tanggalujian : null;

        return view('admin/tanggalujian', compact('isDateSet', 'tanggalujian'));
    }

    public function saveTanggalUjian(Request $request)
    {
        $request->validate([
            'tanggalujian' => 'required|date',
        ]);

        // Check if the date is already set
        $existingRecord = DB::table('tanggal_ujian')->first();

        if (!$existingRecord) {
            DB::table('tanggal_ujian')->insert([
                'tanggalujian' => $request->input('tanggalujian'),
            ]);
            return redirect()->back()->with('success', 'Tanggal ujian berhasil disimpan.');
        }

        return redirect()->back()->with('error', 'Tanggal ujian sudah ada. Anda tidak dapat menambahkannya lagi.');
    }

    public function deleteTanggalUjian()
    {
        $existingRecord = DB::table('tanggal_ujian')->first();

        if ($existingRecord) {
            DB::table('tanggal_ujian')->delete();
            return redirect()->back()->with('success', 'Tanggal ujian berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Tidak ada tanggal ujian yang disimpan.');
    }
    
    public function usertambahsimpan(Request $request)
    {
        $nama = $request->input('nama');
        $email = $request->input('email');
        $alamat = $request->input('alamat');
        $nohp = $request->input('nohp');
        $password = $request->input('password');
        $simpan = [
            'nama' => $nama,
            'email' => $email,
            'alamat' => $alamat,
            'nohp' => $nohp,
            'password' => $password,
        ];
        DB::table('user')->insert($simpan);
        session()->flash('success', 'Berhasil menambahkan data!');
        return redirect('admin/userdaftar');
    }
    public function admindaftarulang()
    {
        // Retrieve all records from the daftarulang table
        $daftarulang = DB::table('daftarulang')->get();
    
        // Prepare data for the view
        $data = [
            'title' => 'Daftar Ulang',
            'daftarulang' => $daftarulang,
        ];
    
        // Return the view with the data
        return view('admin/admindaftarulang', $data);
    }
    public function useredit($id)
    {
        $row = DB::table('user')->where('id', $id)->first();
        $data = [
            'title' => 'Edit user',
            'row' => $row,
        ];
        return view('admin/useredit', $data);
    }

    public function usereditsimpan(Request $request, $id)
    {
        $nama = $request->input('nama');
        $email = $request->input('email');
        $alamat = $request->input('alamat');
        $nohp = $request->input('nohp');

        // Menggunakan operator null coalescing untuk menentukan nilai password
        $password = $request->filled('password') ? $request->input('password') : $request->input('passwordlama');

        $data = [
            'nama' => $nama,
            'email' => $email,
            'alamat' => $alamat,
            'nohp' => $nohp,
            'password' => $password,
        ];

        DB::table('user')->where('id', $id)->update($data);
        session()->flash('success', 'Data berhasil diedit!');
        return redirect('admin/userdaftar');
    }

    public function userhapus($id)
    {
        DB::table('user')->where('id', $id)->delete();
        session()->flash('success', 'Berhasil menghapus data!');
        return redirect('admin/userdaftar');
    }

    public function ppdbpeserta($id)
    {
        $ppdb = DB::table('ppdb')->where('idppdb', $id)->first();

        $pendaftaran = DB::table('pendaftaran')
            ->leftJoin('ppdb', 'ppdb.idppdb', '=', 'pendaftaran.idppdb')
            ->where('pendaftaran.idppdb', $id)
            ->get();
        $data = [
            'title' => 'PPDB',
            'ppdb' => $ppdb,
            'pendaftaran' => $pendaftaran,
        ];
        return view('admin.ppdbpeserta', $data);
    }

    public function ppdbpesertadetail($id)
    {
        $pendaftaran = DB::table('pendaftaran')
            ->where('pendaftaran.idpendaftaran', $id)
            ->first();
        $pembayaran = DB::table('pembayaran')->where('idpendaftaran', $id)->first();
        $data = [
            'title' => 'PPDB',
            'data' => $pendaftaran,
            'pembayaran' => $pembayaran,
        ];
        return view('admin.ppdbpesertadetail', $data);
    }

    public function ppdbpesertasimpan(Request $request, $id)
    {
        $status = $request->input('status');
        $iduser = $request->input('iduser');
        $idppdb = $request->input('idppdb');
        $data = [
            'status' => $status,
        ];
        DB::table('pendaftaran')->where('idpendaftaran', $id)->where('iduser', $iduser)->update($data);
        session()->flash('success', 'Data berhasil diedit!');
        return redirect('admin/ppdbpeserta/' . $idppdb);
    }

    public function admindaftar()
    {
        $admin = DB::table('admin')->where('level', 'Admin')->get();
        $data = [
            'title' => 'Daftar admin',
            'admin' => $admin,
        ];
        return view('admin/admindaftar', $data);
    }

    public function admintambah()
    {
        $data = [
            'title' => 'Tambah admin',
        ];
        return view('admin/admintambah', $data);
    }

    public function admintambahsimpan(Request $request)
    {
        $nama = $request->input('nama');
        $email = $request->input('email');
        $password = $request->input('password');
        $simpan = [
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'level' => 'Admin'
        ];
        DB::table('admin')->insert($simpan);
        session()->flash('success', 'Berhasil menambahkan data!');
        return redirect('admin/admindaftar');
    }

    public function adminedit($id)
    {
        $row = DB::table('admin')->where('idadmin', $id)->first();
        $data = [
            'title' => 'Edit admin',
            'row' => $row,
        ];
        return view('admin/adminedit', $data);
    }

    public function admineditsimpan(Request $request, $id)
    {
        $nama = $request->input('nama');
        $email = $request->input('email');
        $alamat = $request->input('alamat');
        $nohp = $request->input('nohp');

        $password = $request->filled('password') ? $request->input('password') : $request->input('passwordlama');

        $data = [
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
        ];

        DB::table('admin')->where('idadmin', $id)->update($data);
        session()->flash('success', 'Data berhasil diedit!');
        return redirect('admin/admindaftar');
    }

    public function adminhapus($id)
    {
        DB::table('admin')->where('idadmin', $id)->delete();
        session()->flash('success', 'Berhasil menghapus data!');
        return redirect('admin/admindaftar');
    }
}
