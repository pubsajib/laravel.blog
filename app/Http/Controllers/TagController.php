<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    function __construct()
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
        // Fetch all tags
        $tags = Tag::all();
        return view('tags.index')->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the name
        $request->validate([
            'name' => 'required|max:255'
        ]);

        // Store tags
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();
        $tag = $tag->all();

        return redirect()->route('tags.index')->with('success', 'Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Show the single tag related posts
        $data['tag'] = [];

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
        // Find the tag
        $data['tag'] = Tag::find($id);
        return view('tags.edit', $data);
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
        // Validate the name
        $request->validate([
            'name' => 'required|max:255'
        ]);

        // Store tags
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->save();
        $tag = $tag->all();

        return redirect()->route('tags.index')->with('success', 'Created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete the tag
        $tag = Tag::find($id);
        $tag->delete();
        $tag = $tag->all();


        // Redirect after delete
        return redirect()->route('tags.index')
        ->withCategories($tag)
        ->with('success', 'Deleted successfully.');
    }
}
