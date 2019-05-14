<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class PackageController extends Controller
{
    public function index(){
        //view all packages
        return view('categories.index')
            ->with('categories', Category::all())
            ->with('posts', Post::all())
            ->with('all', 'All Packages');
    }

    public function show(Category $category){
        $posts = Post::where('category_id', $category->id)->get();
        //view package
        return view('categories.index')
            ->with('categories', Category::all())
            ->with('posts', $posts);
    }
}
