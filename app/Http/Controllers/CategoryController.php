<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        // dd($category->posts);
        return view('category.show', [
            'posts' => $category->posts()->paginate(5)
        ]);
    }
}
