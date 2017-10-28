<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'content' => 'required',
            ));
        
        // Store in the database
        $post           = new Post;
        $post->title    = $request->title;
        $post->slug    = $request->slug;
//        $post->content  = $request->content;
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
        $data['post'] = Post::where('id', $id)->with('category')->first();

//        dd($data['post']);

        // Show the single post
        return view('posts.show', $data);
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
        $post = Post::find($id);

        // Validate data
        if ( $request->input('slug') == $post->slug ) {
            $request->validate(array(
                'title' => 'required|max:255',
                'content' => 'required',
            ));
        } else {
            $request->validate(array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'content' => 'required',
            ));
        }

        $post->title = $request->title;
        $post->slug = $request->slug;
//        $post->content = $request->content;
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
