<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class BlogController extends Controller
{
	// Get all posts
	public function index()
	{
		// Get all posts
		$post = Post::paginate(5);
    	return view('blog.index')->withPosts($post);
	}

    //get single post
    public function getSingle($slug)
    {
    	// get the post
    	$post = Post::where('slug', '=', $slug)->with('category')->first();
    	return view('blog.single')->withPost($post);
    }
}
