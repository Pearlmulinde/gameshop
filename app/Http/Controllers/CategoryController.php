<?php

namespace App\Http\Controllers;

use App\Models\Category as ModelsCategory;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{   
    public function index()
    {
        $categories = Category::all();
       
        return view('categories.index',compact('categories'));
        
    }
    public function create()
    {
        $categories = Category::all();
        return view('categories.create',compact('categories'));
    }
    public function store(Request $request)
        {$request->validate([
        'name'=>'required|min:3',
        'image'=>'required'
        ]);

        $input = $request -> all();
        if($request->hasFile('image'))
     {
        $destination_path = 'public/images/categories';
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $path = $request -> file('image')->storeAs($destination_path,$image_name);
        $input['image']= $image_name;
     }


     Category::create($input);
     return redirect('/category');
    }


    public function show($id)
{
    $category = Category::find($id);

    if (!$category) {
        // Handle the error if the category is not found
        return redirect()->route('categories.index')->with('error', 'Category not found');
    }

    return view('categories.show', compact('category'));
}
}

