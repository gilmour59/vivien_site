<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Mail\ContactUs;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller
{
    public function index(){
        return view('welcome')
            ->with('posts', Post::hot())
            ->with('categories', Category::all());
    }

    public function about(){
        return view('about')
            ->with('categories', Category::all());
    }

    public function contact(){
        return view('contact')
            ->with('categories', Category::all());
    }

    public function email(Request $request){
        Mail::to('gilmouralmalbisdev@gmail.com')->send(new ContactUs($request->all()));

        session()->flash('success', 'Info Successfully Sent!');

        return redirect()->back();
    }
}
