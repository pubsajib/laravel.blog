<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
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
    public function about()
    {
        // Get all post
        // Pass in on view
        return view('pages.about');
    }

    // Contact page controller
    public function contact()
    {
        // Get all post
        // Pass in on view
        return view('pages.contact');
    }
}
