<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Mail\Contact;
use DB;
use Session;

class PageController extends Controller
{
    // Home page controller
    public function home()
    {
        // Get all post
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        // Pass in on view
        return view('pages.home')->withPosts($posts);
    }

    // About page controller
    public function about() {
        // Get all post
        // Pass in on view
        return view('pages.about');
    }

    // Contact page controller
    public function getContact()
    {
        // Get all post
        // Pass in on view
        return view('pages.contact');
    }
    public function postContact(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|min:3'
        ]);
        \Mail::to('pubsajib@gmail.com')->send(new Contact($request));
        return redirect()->route('contact')->with('success', 'Mail sent successfully');
    }
    public function mailTemplate()
    {
        return new Contact();
    }
}