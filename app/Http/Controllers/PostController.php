<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
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
        // Get all posts for select view
        $categories = Category::all();
        $cats = [];
        if ($categories) {
            foreach ($categories as $category) {
                $cats[$category->id] = $category->name;
            }
        }

        // Create new post form
        return view('posts.create')->withCategories($cats);
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
            'category_id' => 'required|integer',
            'content' => 'required',
            ));
        
        // Store in the database
        $post               = new Post;
        $post->title        = $request->title;
        $post->slug         = $request->slug;
        $post->category_id  = $request->category_id;
        $post->content      = $request->content;
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
        $data['post'] = Post::find($id);

        // Get all posts for select view
        $categories = Category::all();
        $cats = [];
        if ($categories) {
            foreach ($categories as $category) {
                $cats[$category->id] = $category->name;
            }
        }
        $data['categories'] = $cats;

        // Edit post form
        return view('posts.edit', $data);
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
                'title'         => 'required|max:255',
                'category_id'   => 'required|integer',
                'content'       => 'required',
            ));
        } else {
            $request->validate(array(
                'title'         => 'required|max:255',
                'slug'          => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category_id'   => 'required|integer',
                'content'       => 'required',
            ));
        }

        $post->title        = $request->title;
        $post->slug         = $request->slug;
        $post->category_id  = $request->category_id;
        $post->content      = $request->content;
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
