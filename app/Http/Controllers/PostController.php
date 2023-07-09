<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::paginate(6);
        // dd($post);
        return view("post.index")->with("posts", $post);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("post.create")->with([
            "category" => Category::all(),
            "tags" => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // dd($request);


        if ($request->hasFile("photo")) {
            $path = $request->file('photo')->store('post-photo');
        }
        $newPost = Post::create([
            "user_id" => 1,
            "title" => $request->title,
            "category_id" => $request->category,
            "short_content" => $request->short_content,
            "content" => $request->content,
            "photo" => $path ?? null
        ]);
        if (isset($request->tag)) {
            // dd($request);
            foreach ($request->tag as $tag) {
                $newPost->tags()->attach($tag);
            }
        }
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
                "resent_post" => Post::latest()->get()->except($post->id)->take(3),
                "category" => Category::all()
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view("post.edit")->with([
            "post" => $post,
            "category" => Category::all(),
            "tags" => Tag::all()

        ]);
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
            "user_id" => 1,
            "title" => $request->title,
            "category_id" => $request->category,
            "short_content" => $request->short_content,
            "content" => $request->content,
            "photo" => $path ?? $post->photo,
        ]);

        if (isset($request->tags)) {

            // dd($request->tags);
            $post->tags()->sync($request->tags);
            // foreach ($request->tags_id as $tag) {

            // }
        }
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
