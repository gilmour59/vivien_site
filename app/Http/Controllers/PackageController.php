<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class PackageController extends Controller
{
    public function index(){
        //view all packages
        return view('packages.index')
            ->with('categories', Category::all())
            ->with('posts', Post::search())
            ->with('all', 'All Packages');
    }

    public function show(Category $category){
        //view package
        return view('packages.index')
            ->with('categories', Category::all())
            ->with('posts', $category->posts()->search())
            ->with('category', $category);
    }

    public function searchAll(){
        return view('packages.search')
            ->with('categories', Category::all())
            ->with('posts', Post::search());
    }
}
