<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input("sort", "desc");
        $search = $request->input("search");

        $posts = Post::query()
            ->orderBy("created_at", $sort)
            ->when($search, fn (Builder $q, $keyword) => $q->where("name", "like", "%$keyword%"))
            ->simplePaginate(5);

        return view("posts.index", [
            "posts" => $posts,
            "sort" => $sort,
        ]);
    }

    public function create()
    {
        return view("posts.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "text" => "required|min:5",
        ], [
            "name.required" => "Navn må være utfylt",
            "text.required" => "Du må skrive inn noe tekst",
            "text.min" => "Teksten må være minst 5 tegn",
        ]);

        $post = Post::create([
            "name" => $request->input("name"),
            "text" => $request->input("text"),
        ]);


        return redirect()->route("posts.index");
    }

    public function show(Post $post)
    {
        return view("posts.show", [
            "post" => $post,
        ]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route("posts.index");
    }
}
