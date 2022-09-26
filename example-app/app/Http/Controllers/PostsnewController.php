<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsnewController extends Controller
{
    //
    public function getAllPost()
    {
        $posts = DB::table('postsnews')->get();
       return view('postsnews.posts', compact('posts'));
    }
    public function addPost()
    {
        return view('postsnews.add-post');
    }
    public function addPostSubmit(Request $request)
    {
        DB::table('postsnews')->insert([
         'title'=>$request->title,
          'body' => $request->body
        ]);
        return back()->with('post_created', 'Post has been created successfully');
    }

    public function getPostById($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        return view('postsnews.single-post', compact('post'));
    }
    public function deletePost($id)
    {
        DB::table('postsnews')->where('id', $id)->delete();
        return back()->with('post_deleted', 'Post has been deleted successfully');
    }

    public function editPost($id)
    {
        $post = DB::table('postsnews')->where('id', $id)->first();
        return view('postsnews.edit-post', compact('post'));
    }
    public function updatePost(Request $request)
    {
        DB::table('postsnews')->where('id', $request->id)->update([
            'title'=>$request->title,
            'body'=>$request->body
        ]);
        return back()->with('post_updated', 'Post has been updated successfully');
    }
}
