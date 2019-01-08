<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Mail\Contact;
use DB;
use Session;

class MessageController extends Controller {
    // Contact page controller
    public function show() {
        // Get all post
        // Pass in on view
        return view('pages.contact');
    }
    public function save(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|min:3'
        ]);
        \Mail::to('pubsajib@gmail.com')->send(new Contact($request));
        return redirect()->route('contact')->with('success', 'Mail sent successfully');
    }
    public function mailTemplate() {
        return new Contact();
    }
}