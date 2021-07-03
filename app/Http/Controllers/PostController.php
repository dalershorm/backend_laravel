<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'posts' => Post::with('user', 'category')->where('is_active', 1)->paginate(6)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=> 'required',
            'desc'=> 'required',
            'user_id'=> 'required',
            'category_id'=> 'required',
            'is_active'=> 'required',
        ]);

        $post = Post::create([
            'title'=> $request->title,
            'desc'=> $request->desc,
            'user_id'=> $request->user_id,
            'category_id'=> $request->category_id,
            'is_active'=> $request->is_active,
        ]);

        return response()->json([
            'post' => $post
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $post = Post::with('user', 'category')->find($id);
        return response()->json([
            'post' => $post->load('user', 'category')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title'=> 'required',
            'desc'=> 'required',
            'user_id'=> 'required',
            'category_id'=> 'required',
            'is_active'=> 'required',
        ]);

        $post->update([
            'title'=> $request->title,
            'desc'=> $request->desc,
            'user_id'=> $request->user_id,
            'category_id'=> $request->category_id,
            'is_active'=> $request->is_active,
        ]);

        return response()->json([
            'post' => $post->load('user', 'category')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
    }
}
