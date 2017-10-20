<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all post
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        // Pass in on view
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create new post form
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate data
        $request->validate(array(
            'title' => 'required|max:128',
            'content' => 'required',
            ));
        
        // Store in the database
        $post           = new Post;
        $post->title    = $request->title;
        $post->content  = $request->content;
        $post->save();
        
        // Success Message
        // Redirect to another page
        return redirect()->route('posts.show', $post->id)->with('success', 'Created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get the post content
        $post = Post::find($id);

        // Show the single post
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get the post content
        $post = Post::find($id);

        // Edit post form
        return view('posts.edit')->withPost($post);
        // return view('posts.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate data
        $request->validate(array(
            'title' => 'required|max:128',
            'content' => 'required',
        ));

        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        // Redirect after successfully saved
        return redirect()->route('posts.show', $post->id)->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete the post
        $post = Post::find($id);
        $post->delete();

        // Redirect after delete
        return redirect()->route('posts.index')->with('success', 'Deleted successfully');
    }
}
