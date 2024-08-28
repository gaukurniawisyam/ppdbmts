<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\CustomNotification;
use App\Models\User;

class NotificationController extends Controller
{
    public function create()
    {
        return view('admin.send-notification');
    }

    public function send(Request $request)
    {
        $request->validate([
            'recipient_id' => 'required|exists:users,id',
            'title' => 'required|string',
            'message' => 'required|string',
        ]);

        $user = User::find($request->recipient_id);
        $details = [
            'title' => $request->title,
            'message' => $request->message
        ];

        $user->notify(new CustomNotification($details));

        return redirect()->back()->with('success', 'Notification sent successfully!');
    }
        public function index()
    {
        $notifications = auth()->user()->notifications;

        return view('notifications.index', compact('notifications'));
    }
}