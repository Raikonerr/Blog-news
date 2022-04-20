<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category','user')->latest()->get();

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

        $imageName = $request->immage->store('posts');
        Post::create([
            'title' => $request->title,
            'Body' => $request->Body,
            'immage' => $imageName,
            
        ]);

        return redirect()->route('dashboard')->with('success', 'Post Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(!Gate::denies('update-post', $post)){
            abort(403, 'Unauthorized action');
        }

        $categories = Category::all();
        return view('post.edit', compact('post' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {

        $arrayUpdate = [
            'title' => $request->title,
            'Body' => $request->Body,
        ];

        if($request->immage != null){

            $imageName = $request->immage->store('posts');

         $arrayUpdate = array_merge($arrayUpdate,
         ['immage'=> $imageName]);
        

        $post->update([
            'title' => $request->title,
            'Body' => $request->Body,
            'immage' => $request->immage,
            'category_id' => $request->category,
        ]);
    }
        

        $post->update($arrayUpdate);
        return redirect()->route('dashboard')->with('success', 'Post Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(!Gate::denies('destroy-post', $post)){
            abort(403, 'Unauthorized action');
        }

        $post->delete();
        return redirect()->route('dashboard')->with('success', 'Post Deleted Successfully');
    }
}
