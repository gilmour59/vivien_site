<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
        //view all packages
        return view();
    }

    public function show(Category $category){
        //view package
    }
}
