<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use App\Services\Slug;
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
        $posts = Post::orderBy('id', 'desc')->with('category', 'author')->paginate(5);
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
        $data['categories'] = $cats;
        
        // Get all tags for select view
        $allTags = Tag::all();
        $tags = [];
        if ($allTags) {
            foreach ($allTags as $singleTag) {
                $tags[$singleTag->id] = $singleTag->name;
            }
        }
        $data['allTags'] = $tags;

        // Create new post form
        return view('posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = \Auth::user();
        $slug = new Slug;

        // Validate data
        $request->validate(array(
            'title' => 'required|max:255',
            // 'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'content' => 'required',
            ));
        // dd($slug->createSlug($request->title));
        // Store in the database
        $post               = new Post;
        $post->title        = $request->title;
        $post->slug         = $slug->createSlug($request->title);
        $post->category_id  = $request->category_id;
        $post->content      = $request->content;
        $post->user_id      = $user->id;
        $post->save();

        // Insert into post_tags table
        $post->tag()->sync($request->tags, false);
        
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
        $data['post'] = Post::where('id', $id)->with('tag', 'category', 'author')->first();
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

        // Get all tags for select view
        $allTags = Tag::all();
        $tags = [];
        if ($allTags) {
            foreach ($allTags as $singleTag) {
                $tags[$singleTag->id] = $singleTag->name;
            }
        }
        $data['allTags'] = $tags;
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

        // Update into post_tags table
        if ( isset($request->tags) ) $post->tag()->sync($request->tags, true);
        else $post->tag()->sync([], true);

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
