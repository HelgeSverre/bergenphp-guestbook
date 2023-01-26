<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input("sort", "desc");

        return view("posts.index", [
            "posts" => Post::query()->orderBy("created_at", $sort)->get(),
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
}
