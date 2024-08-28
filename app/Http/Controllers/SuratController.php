<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratController extends Controller
{
    public function showSurat()
    {
        return view('surat');
    }

    public function downloadPDF()
    {
        $data = [
            'title' => 'Contoh Surat Pernyataan',
            'body' => 'Ini adalah isi dari surat yang akan didownload sebagai PDF.'
        ];

        // Load view dan generate PDF
        $pdf = PDF::loadView('surat-pdf', $data);

        // Stream PDF ke browser
        return $pdf->stream('surat-pernyataan.pdf');
    }
   
}
