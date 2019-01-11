<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderBy('id', 'desc')->with('post', 'author')->get();
        return view('comments.index')->withComments($comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Dont need right now
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'body'  => 'required',
            'post_id' => 'required|integer'
        ]);

        $user = \Auth::user();
        $comment = new Comment;
        $comment->title     = $request->title;
        $comment->body      = $request->body;
        $comment->post_id   = $request->post_id;
        $comment->user_id   = Auth::User()->id;
        $comment->is_approved   = 0;
        $comment->save();

        return redirect()->route('posts.show', $request->post_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::where('id', $id)->with('post', 'author')->first();
        return view('comments.show')->withComment($comment); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit')->withComment($comment); 
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
        $request->validate([
            'title'         => 'required',
            'body'          => 'required',
            'is_approved'   => 'required'
        ]);

        $comment = Comment::find($id);
        $comment->title     = $request->title;
        $comment->body      = $request->body;
        $comment->is_approved   = $request->is_approved;
        $comment->save();

        return redirect()->route('comments.show', $id)->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'successfully deleted.');
    }
}
