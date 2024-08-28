<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    /**
     * Show participant data and available participants for notification.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function showParticipantData($id)
    {
        // Fetch participant data based on $id
        $data = User::find($id);
        
        // Fetch all participants
        $participants = User::all();

        // Pass the data to the view
        return view('admin.index', compact('data', 'participants'));
    }
}
