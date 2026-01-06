<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {


        $validate = $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Mail::raw($validate['message'], function ($message) use ($validate) {
            $message->to('articleweblaravel@gmail.com');
            $message->subject('New Message from ' . $validate['email']);
        });

        return back()->with('success', 'Message has been sent!');
    }
}
