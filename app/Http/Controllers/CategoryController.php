<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;

class CategoryController extends Controller
{
    public function index() 
    {
    	$categories = Category::all();

    	return view('admin.categories.index', compact('categories'));
    }

    public function create() 
    {
    	return view('admin.categories.create');
    }

    public function edit(Category $category) 
    {
    	return view('admin.categories.edit', compact('category'));
    }

    public function editSave(Category $category, Request $request) 
    {
    	$category->name = $request->name;
    	$category->save();
    	return redirect('admin/categories/index');
    }

    public function delete(Category $category)
    {
    	$category->delete();
    	return redirect('admin/categories/index');
    }
}
