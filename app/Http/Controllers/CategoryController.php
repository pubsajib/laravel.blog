<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
class CategoryController extends Controller {
    
    function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        // Fetch all categories
        $categories = Category::latest()->paginate(10);
        return view('categories.index')->withCategories($categories);
    }
    public function store(Request $request) {
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
    public function show($id) {
        // Get the category
        $category = Category::where('id', $id)->with('posts')->first();
        return view('categories.show', compact('category'));
    }
    public function edit($id) {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        // Store categories
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return view('categories.show', compact('category'));
    }
    public function destroy($id) {
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
