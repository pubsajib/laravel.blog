<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Mail\Contact;
use DB;
use Session;

class MessageController extends Controller {
    public function index() {
        $messages = Message::orderBy('id', 'desc')->get();
        return view('messages.index', compact('messages'));
    }
    public function show() {
        return view('pages.contact');
    }
    public function save(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:3'
        ]);

        $message = new Message;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->body = $request->message;
        $message->save();
        // dd($message);
        \Mail::to('pubsajib@gmail.com')->send(new Contact($request));
        return redirect()->route('contact')->with('success', 'Mail sent successfully');
    }
    public function mailTemplate() {
        return new Contact();
    }
}