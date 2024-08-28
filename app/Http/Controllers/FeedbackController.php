<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback; // Assuming you have a Feedback model

class FeedbackController extends Controller
{
    public function create()
    {
        return view('send_feedback');
    }

    public function store(Request $request)
    {
        $request->validate([
            'idpendaftaran' => 'required',
            'message' => 'required',
        ]);

        Feedback::create([
            'idpendaftaran' => $request->idpendaftaran,
            'message' => $request->message,
        ]);
        return redirect()->back()->with('feedback', 'Your feedback message here.');
        return redirect()->route('send_feedback_form')->with('success', 'Feedback berhasil dikirim.');
    }
    
}
