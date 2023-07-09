<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function store(Request $request) 
    {
        // $comment = Comment::crete([
        //     "body"=>$request->body,
        //     "user_id"=>$request->user_id,
        //     "post_id"=>$request->post_id
        // ]);
        $post = Post::find($request->post_id);
        $post->comments()->create([
            "body" => $request->body,
            "user_id" => 1,
        ]);
        return redirect()->back();
    }
}
