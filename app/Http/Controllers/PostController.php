<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Slug;
use App\Category;
use App\Post;
use App\Tag;
use Purifier;
use Image;
use File;

class PostController extends Controller {
    public function __construct() {
        $this->middleware('auth')->except('show');
    }
    public function index() {
        // Get all post
        $posts = Post::orderBy('id', 'desc')->with('category', 'author')->paginate(5);
        // Pass in on view
        return view('posts.index')->withPosts($posts);
    }
    public function create() {
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
    public function store(Request $request) {
        // dd($request);
        $user = \Auth::user();
        $slug = new Slug;

        // Validate data
        $request->validate(array(
            'title' => 'required|max:255',
            // 'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'content' => 'required',
            'image' => 'sometimes|image',
            ));
        // dd($slug->createSlug($request->title));
        // Store in the database
        $post               = new Post;
        $post->title        = $request->title;
        $post->slug         = $slug->createSlug($request->title);
        $post->category_id  = $request->category_id;
        $post->content      = Purifier::clean($request->body);
        $post->user_id      = $user->id;

        // Featured image
        if ( $request->hasFile('image') ) {
            $image = $request->file('image');
            $fileName = 'post-'. time() .'.'. $image->getClientOriginalExtension();
            $location = public_path('images/'. $fileName);
            Image::make($image)->resize(800, 400)->save($location);

            $post->image    = $fileName;
        }

        $post->save();

        // Insert into post_tags table
        $post->tag()->sync($request->tags, false);
        
        // Success Message
        // Redirect to another page
        return redirect()->route('posts.show', $post->id)->with('success', 'Created successfully.');
    }
    public function show($id) {
        // Get the post content
        if (is_numeric($id)) {
            $post = Post::where('id', $id)->with('tag', 'category', 'author', 'comment')->first();
        } else{
            $post = Post::where('slug', $id)->with('tag', 'category', 'author', 'comment')->first();
        }
        // Show the single post
        return view('posts.show', compact('post'));
    }
    public function edit($id) {
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
    public function update(Request $request, $id) {
        $post = Post::find($id);

        // Validate data
        $request->validate(array(
            'title'         => 'required|max:255',
            'slug'          => "required|alpha_dash|min:3|max:255|unique:posts,slug,$id",
            'category_id'   => 'required|integer',
            'content'       => 'required',
            'image'         => 'image',
        ));

        // Featured image
        if ( $request->hasFile('image') ) {
            $image = $request->file('image');
            // dd($image->getClientOriginalName());
            $fileName = 'post-'. time() .'.'. $image->getClientOriginalExtension();
            $location = public_path('images/'. $fileName);
            Image::make($image)->resize(800, 400)->save($location);
            File::delete('images/'.$post->image);
            $post->image    = $fileName;
        }

        $post->title        = $request->title;
        $post->slug         = $request->slug;
        $post->category_id  = $request->category_id;
        $post->content      = Purifier::clean($request->content);
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
    public function destroy($id) {
        //Delete the post
        $post = Post::find($id);
        $post->delete();
        File::delete('images/'. $post->image);

        // Redirect after delete
        return redirect()->route('posts.index')->with('success', 'Deleted successfully');
    }
}
