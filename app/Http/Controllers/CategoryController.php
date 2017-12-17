<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
class CategoryController extends Controller
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
        // Fetch all categories
        $categories = Category::all();
        return view('categories.index')->withCategories($categories);
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

        // Store categories
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        $category = $category->all();

        return redirect()->route('categories.index')->with('success', 'Created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get the category
        $data['category'] = Category::where('id', $id)->with('posts')->first();
        return view('categories.single', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete the category
        $category = Category::find($id);
        $category->delete();
        $category = $category->all();


        // Redirect after delete
        return redirect()->route('categories.index')
        ->withCategories($category)
        ->with('success', 'Deleted successfully.');
    }
}
