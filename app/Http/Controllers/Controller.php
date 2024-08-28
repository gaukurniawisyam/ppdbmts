<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    public function uploadKK(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png|max:2048',
            'idpendaftaran' => 'required|integer'
        ]);

        $fileName = time() . '.' . $request->file->extension();  
        $request->file->move(public_path('foto'), $fileName);

        DB::table('pendaftaran')->where('idpendaftaran', $request->idpendaftaran)->update([
            'kk' => $fileName,
            'status' => 'Berkas Diterima dan Sedang Verifikasi'
        ]);

        return back()->with('success', 'File KK uploaded successfully.');
    }

    public function delete_kk($kk)
    {
        $record = DB::table('pendaftaran')->where('idpendaftaran', $kk)->first();

        if ($record && $record->kk) {
            $filePath = public_path('foto/' . $record->kk);

            if (file_exists($filePath)) {
                unlink($filePath);
                DB::table('pendaftaran')->where('idpendaftaran', $kk)->update(['kk' => null]);
                return back()->with('success', 'KK deleted successfully');
            } else {
                return back()->with('error', 'File not found');
            }
        } else {
            return back()->with('error', 'Record not found or no KK file to delete');
        }
    }

    public function upload_ktp(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png|max:2048',
            'idpendaftaran' => 'required|integer'
        ]);

        $fileName = time() . '.' . $request->file->extension();  
        $request->file->move(public_path('foto'), $fileName);

        DB::table('pendaftaran')->where('idpendaftaran', $request->idpendaftaran)->update([
            'ktp' => $fileName,
            'status' => 'Berkas Diterima dan Sedang Verifikasi'
        ]);

        return back()->with('success', 'File KTP uploaded successfully.');
    }

    public function delete_ktp($ktp)
    {
        $record = DB::table('pendaftaran')->where('idpendaftaran', $ktp)->first();

        if ($record && $record->ktp) {
            $filePath = public_path('foto/' . $record->ktp);

            if (file_exists($filePath)) {
                unlink($filePath);
                DB::table('pendaftaran')->where('idpendaftaran', $ktp)->update(['ktp' => null]);
                return back()->with('success', 'KTP deleted successfully');
            } else {
                return back()->with('error', 'File not found');
            }
        } else {
            return back()->with('error', 'Record not found or no KTP file to delete');
        }
    }

    public function uploadIjazah(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png|max:2048',
            'idpendaftaran' => 'required|integer'
        ]);

        $fileName = time() . '.' . $request->file->extension();  
        $request->file->move(public_path('foto'), $fileName);

        DB::table('pendaftaran')->where('idpendaftaran', $request->idpendaftaran)->update([
            'ijazah' => $fileName,
            'status' => 'Berkas Diterima dan Sedang Verifikasi'
        ]);

        return back()->with('success', 'File Ijazah uploaded successfully.');
    }
    public function updateStatus(Request $request, $idpendaftaran)
    {
        // Validate and update the status
        $request->validate([
            'status' => 'required|string',
        ]);
    
        DB::table('pendaftaran')->where('idpendaftaran', $idpendaftaran)->update([
            'status' => $request->input('status'),
        ]);
    
        return redirect()->back()->with('success', 'Status updated successfully.');
    }
    
    public function deleteIjazah($id)
    {
        $record = DB::table('pendaftaran')->where('idpendaftaran', $id)->first();

        if ($record && $record->ijazah) {
            $filePath = public_path('foto/' . $record->ijazah);

            if (file_exists($filePath)) {
                unlink($filePath);
                DB::table('pendaftaran')->where('idpendaftaran', $id)->update(['ijazah' => null]);
                return back()->with('success', 'Ijazah deleted successfully');
            } else {
                return back()->with('error', 'File not found');
            }
        } else {
            return back()->with('error', 'Record not found or no Ijazah file to delete');
        }
        
    }
}
