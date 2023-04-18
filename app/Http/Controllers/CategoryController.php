<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function store(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Save image file if uploaded
        $imagePath = null;
        if ($request->has('image')) {
            $imagePath = $request->file('image')->store('public/categories');
        }
    
        // Prepare data to insert into database
        $data = [
            'name' => $request->input('name'),
            'image' => $imagePath,
            'active' => $request->input('active') == 'on' ? 'Y' : 'N',
        ];
    
        // Create table for the categories if it doesn't exist
        DB::statement('CREATE TABLE IF NOT EXISTS categories (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            image VARCHAR(255) NULL,
            active ENUM("Y", "N") NOT NULL DEFAULT "Y",
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )');
    
        try {
            // Insert data into database
            DB::table('categories')->insert($data);
    
            return redirect()->back()->with('success', 'Category added successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error occurred while adding category: '.$th->getMessage());
        }
    }

    public function index()
{
    $categories = DB::table('categories')->get();
    return view('categories', compact('categories'));
}

    
    public function show($id)
    {
        // Get the category by id
        $category = DB::table('categories')->where('id', $id)->first();

        // If category not found, redirect back with error
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found!');
        }

        // Pass category data to the view
        return view('category.show', ['category' => $category]);
    }

    public function edit($id)
    {
        // Get the category by id
        $category = DB::table('categories')->where('id', $id)->first();

        // If category not found, redirect back with error
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found!');
        }

        return view('categories.edit', ['category' => $category]);
    }

public function update(Request $request, Category $category)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'active' => 'required|in:Y,N',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $category->name = $request->name;
    $category->active = $request->active;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = 'images/categories/' . $filename;
        Storage::disk('public')->put($path, file_get_contents($image));
        $category->image = $path;
    }

    $category->save();
    return redirect()->route('categories.edit', ['category' => $category->id])->with('success', 'Category updated successfully');


    
}

public function destroy(Category $category)
{
    $category->delete();

    return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
}

public function getActiveCategories()
{
    $categories = DB::table('categories')->where('active', 'Y')->orderBy('name')->get();
    
    return view('city', compact('categories'));
}







}
