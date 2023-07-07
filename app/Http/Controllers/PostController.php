<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::paginate(3);
        // dd($post);
        return view("post.index")->with("posts", $post);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("post.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $path = $request->file('photo')->store('post-photo');

        $newPost = Post::create([
            "title" => $request->title,
            "short_content" => $request->short_content,
            "content" => $request->content,
            "photo" => $path
        ]);
        return redirect()->route("post.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)


    {

        // dd($post);
        return view("post.show")->with(
            [
                "post" => $post,
                "resent_post" => Post::latest()->get()->except($post->id)->take(3)
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view("post.edit")->with("post", $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        if ($request->hasFile("photo")) {
            if (isset($post->photo)) {
                Storage::delete($post->photo);
            }
            $path = $request->file('photo')->store('post-photo');
        }
        $post->update([
            "title" => $request->title,
            "short_content" => $request->short_content,
            "content" => $request->content,
            "photo" => $path ?? $post->photo,
        ]);
        return redirect()->route("post.show", ["post" => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {


        // dd($post);
        if (isset($post->photo)) {
            Storage::delete($post->photo);
        }
        $post->delete();

        return redirect()->route("post.index");
    }
}
