<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FileController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function uploadKK(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png|max:2048',
            'idpendaftaran' => 'required|integer'
        ]);

        $fileName = time() . '.' . $request->file->extension();  
        $request->file->move(public_path('foto'), $fileName);

        DB::table('pendaftaran')->where('idpendaftaran', $request->idpendaftaran)->update(['kk' => $fileName]);

        return back()->with('success', 'File uploaded successfully.');
    }

    public function deleteKK($id)
    {
        $record = DB::table('pendaftaran')->where('idpendaftaran', $id)->first();

        if ($record && $record->kk) {
            $filePath = public_path('foto/' . $record->kk);

            if (file_exists($filePath)) {
                unlink($filePath);
                DB::table('pendaftaran')->where('idpendaftaran', $id)->update(['kk' => null]);
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'error' => 'File not found']);
            }
        } else {
            return response()->json(['success' => false, 'error' => 'Record not found or no KK file to delete']);
        }
    }

    public function uploadKtp(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png|max:2048',
            'idpendaftaran' => 'required|integer'
        ]);

        $fileName = time() . '.' . $request->file->extension();  
        $request->file->move(public_path('foto'), $fileName);

        DB::table('pendaftaran')->where('idpendaftaran', $request->idpendaftaran)->update(['ktp' => $fileName]);

        return back()->with('success', 'File uploaded successfully.');
    }

    public function deleteKtp($id)
    {
        $record = DB::table('pendaftaran')->where('idpendaftaran', $id)->first();

        if ($record && $record->ktp) {
            $filePath = public_path('foto/' . $record->ktp);

            if (file_exists($filePath)) {
                unlink($filePath);
                DB::table('pendaftaran')->where('idpendaftaran', $id)->update(['ktp' => null]);
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'error' => 'File not found']);
            }
        } else {
            return response()->json(['success' => false, 'error' => 'Record not found or no KTP file to delete']);
        }
    }

    public function uploadfoto(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png|max:2048',
            'idpendaftaran' => 'required|integer'
        ]);

        $fileName = time() . '.' . $request->file->extension();  
        $request->file->move(public_path('foto'), $fileName);

        DB::table('pendaftaran')->where('idpendaftaran', $request->idpendaftaran)->update(['foto' => $fileName]);

        return back()->with('success', 'File uploaded successfully.');
    }

    public function deletefoto($id)
    {
        $record = DB::table('pendaftaran')->where('idpendaftaran', $id)->first();

        if ($record && $record->foto) {
            $filePath = public_path('foto/' . $record->foto);

            if (file_exists($filePath)) {
                unlink($filePath);
                DB::table('pendaftaran')->where('idpendaftaran', $id)->update(['foto' => null]);
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'error' => 'File not found']);
            }
        } else {
            return response()->json(['success' => false, 'error' => 'Record not found or no foto file to delete']);
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

        DB::table('pendaftaran')->where('idpendaftaran', $request->idpendaftaran)->update(['ijazah' => $fileName]);

        return back()->with('success', 'File uploaded successfully.');
    }

    public function deleteIjazah($id)
    {
        $record = DB::table('pendaftaran')->where('idpendaftaran', $id)->first();

        if ($record && $record->ijazah) {
            $filePath = public_path('foto/' . $record->ijazah);

            if (file_exists($filePath)) {
                unlink($filePath);
                DB::table('pendaftaran')->where('idpendaftaran', $id)->update(['ijazah' => null]);
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'error' => 'File not found']);
            }
        } else {
            return response()->json(['success' => false, 'error' => 'Record not found or no Ijazah file to delete']);
        }
    }

    public function viewFile($filename)
    {
        $path = public_path('foto/' . $filename);

        if (file_exists($path)) {
            return response()->file($path);
        } else {
            abort(404, 'File not found');
        }
    }
}
