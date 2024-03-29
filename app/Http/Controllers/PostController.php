<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create_edit')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $image = $request->image->store('posts/img');

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $image,
            'category_id' => $request->category,
            'days' => $request->days,
            'nights' => $request->nights,
            'price' => $request->price,
            'flight' => $request->flight,
            'published_at' => $request->published_at,
        ]);

        session()->flash('success', 'Post successfully Added!');

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show')->with('post', $post)->with('categories', Category::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create_edit')->with('post', $post)->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title', 'description', 'content', 'days', 'nights', 'price', 'flight', 'published_at']);

        if($request->hasFile('image')){
            $image = $request->image->store('posts/img');
            $post->deleteImage();

            $data['image'] = $image;
        }

        $data['category_id'] = $request->category;

        $post->update($data);

        session()->flash('success', 'Post Updated!');

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        session()->flash('success', 'Post successfully Trashed!');

        return redirect(route('posts.index'));
    }

    public function destroyTrash($id)
    {
        $post = Post::onlyTrashed()->where('id', $id)->firstOrFail();

        $post->deleteImage();
        $post->forceDelete();

        session()->flash('success', 'Post successfully Deleted!');

        return redirect(route('posts.trash'));
    }

    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();

        //the same with (view('posts.trash')->with('post', $trashed))
        return view('posts.index')->withPosts($trashed)->with('trash', true);
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->where('id', $id)->firstOrFail();
        $post->restore();

        session()->flash('success', 'Post successfully Restored!');

        return redirect()->back();
    }

    public function hot(Post $post)
    {
        if($post->hot === 0){
            $post->hot = 1;
            $post->save();

            session()->flash('success', 'Post Added to Hot Section!');
            
            return redirect()->back();
        }else{
            $post->hot = 0;
            $post->save();

            session()->flash('success', 'Post Removed from Hot Section!');
            
            return redirect()->back();
        }
    }
}
