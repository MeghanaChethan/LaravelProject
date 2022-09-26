<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    public function addPost(){
        return view('add-post');
    }
    public function createPost(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return "Post has been created successfully";
    }

    public function getPosts(){
        $posts = Post::all();
        return view('posts', ['posts'=>$posts]);
    }

    public function deletePost($id)
    {
        Post::where('id', $id)->delete();
        return "Post is deleted successfully!";
    }

    public function updatePost(Request $request)
    {
        $post = Post::where('id', $request->id)->first();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return "Post has been Updated Successfully";

    }
    public function updateForm($id)
    {
        $post = Post::where('id', $id)->first();
        return view('edit-post', ['post'=>$post]);
    }
}
