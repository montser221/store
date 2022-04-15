<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $post_items = Post::with(['category'])->where('status','published')->get();
        return view('posts.index',[
            'post_items'=>$post_items
        ]);
    } 

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show',[
            'post'=>$post]);
    }
}
