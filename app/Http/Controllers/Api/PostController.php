<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate();
        $posts = Post::all();
        return response()->json([
           'success' => true,
           'results' => $posts
        ]);
    }

    public function show(Post $post)
    {
        $post = Post::where('id', $post->id)->with(['category', 'tags'])->first();
        if ($post){ // se il post esiste
            return response()->json([
                'success' => true,
                'results' => $post,
            ]);
        } else { // se non esiste
            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function random() {
        $posts = Post::inRandomOrder()->limit(9)->get();
        return response()->json([
            'success' => true,
            'results' => $posts,
        ]);
    }
}
