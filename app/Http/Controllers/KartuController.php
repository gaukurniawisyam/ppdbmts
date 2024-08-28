<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class KartuController extends Controller
{
    public function showKartu()
    {
        return view('kartu');
    }

    public function downloadPDF()
    {
        // Ambil data dari tabel pendaftaran dan tanggal_ujian
        $pendaftaran = DB::table('pendaftaran')->select('nama', 'nisn', 'jeniskelamin')->first();
        $tanggalUjian = DB::table('tanggal_ujian')->select('tanggalujian')->first();

        // Masukkan data ke array
        $data = [
            'nama' => $pendaftaran->nama ?? 'Nama Tidak Ditemukan',
            'nisn' => $pendaftaran->nisn ?? 'NISN Tidak Ditemukan',
            'jeniskelamin' => $pendaftaran->jeniskelamin ?? 'Jenis Kelamin Tidak Ditemukan',
            'tanggalujian' => $tanggalUjian->tanggalujian ?? 'Tanggal Ujian Tidak Ditemukan',
            'logo_path' => public_path('images/logo.png'), // Path gambar logo
            'barcode_path' => public_path('images/barcode.png'), // Path gambar barcode
        ];

        // Load view dan generate PDF
        $pdf = Pdf::loadView('kartuujian', $data);

        // Stream PDF ke browser
        return $pdf->stream('kartu_ujian.pdf');
    }
}
