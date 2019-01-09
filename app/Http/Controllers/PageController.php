<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Mail\Contact;
use DB;
use Session;

class PageController extends Controller {
    // Home page controller
    public function home() {
        // Get all post
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        // Pass in on view
        return view('pages.home')->withPosts($posts);
    }

    // About page controller
    public function about() {
        // Get all post
        // Pass in on view
        return view('pages.about');
    }
    public function mailTemplate() {
        return new Contact();
    }
}