<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

   /*  private $validations = [
        'slug'   => [
        'required',
        'string',
        'max:100',],
        Rule::unique('posts')->ignore($post),
    'title'  => 'required|string|max:100',
    'image'  => 'nullable|url|max:300',
    'content'=> 'nullable|string',
    'except' => 'nullable|string',]; */
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all('id', 'name');
        $tags = Tag::all('id', 'name');
        return view('admin.posts.create', [
            'categories' => $categories,
            'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        /* $this->validations['slug'][] = 'unique:posts';
        $request->validate($this->validations);*/
        $request->validate([
            'slug'        => 'required|string|max:100|unique:posts',
            'title'       => 'required|string|max:100',
            'category_id' => 'required|integer|exists:categories,id',
            'image'       => 'nullable|url|max:300',
            'tags'        => 'array',
            'tags.*'      => 'integer|exists:tags,id',
            'uploaded_img'=> 'nullable|image|max:5000',
            'content'     => 'nullable|string',
            'except'      => 'nullable|string']);

        $data = $request->all();
        $img_path = isset($data['uploaded_img']) ?
        Storage::put('uploads', $data['uploaded_img']) : null;
        $post = new Post;
        $post->slug         = $data['slug'];
        $post->title        = $data['title'];
        $post->image        = $data['image'];
        $post->category_id  = $data['category_id'];
        $post->uploaded_img = $img_path;
        $post->content      = $data['content'];
        $post->except       = $data['except'];
        $post->save();
        $post->tags()->attach($data['tags']);
        return redirect()->route('admin.posts.show', ['post' => $post]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all('id', 'name');
        $tags       = Tag::all('id', 'name');
        return view('admin.posts.edit',[
            'post'       => $post,
            'categories' => $categories,
            'tags'       => $tags
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        /* $this->validations['slugs'][] =
        Rule::unique('posts')->ignore($post); */
        $request->validate([
            'slug'   => [
            'required',
            'string',
            'max:100',
            Rule::unique('posts')->ignore($post),],
            'title'       => 'required|string|max:100',
            'image'       => 'nullable|url|max:300',
            'uploaded_img'=> 'nullable|image|max:5000',
            'category_id' => 'required|integer|exists:categories,id',
            'tags'        => 'array|nullable',
            'tags.*'      => 'integer|exists:categories,id',
            'content'     => 'nullable|string',
            'except'      => 'nullable|string',]);

            $data = $request->all();
            $img_path = isset($data['uploaded_img']) ? Storage::put('uploads', $data['uploaded_img']) : null;
            Storage::delete($post->uploaded_img);
            $post->slug     = $data['slug'];
            $post->title    = $data['title'];
            $post->image    = $data['image'];
            $post->uploaded_img = $img_path;
            $post->category_id  = $data['category_id'];
            $post->content  = $data['content'];
            $post->except   = $data['except'];
            $post->update();
            $post->tags()->sync($data['tags']);
            return redirect()->route('admin.posts.show', ['post' => $post]);
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->detach();
 // in alternativa = $post->tags()->sync([]);
        $post->delete();
        return redirect()
        ->route('admin.posts.index')->with('deleted', $post);
    }

    public function slug(Request $request) {
        // richiesta Async JS
        // localhost:8000/admin/posts/slug?title=ciao a tutti
        $title = $request->query('title');
        // risposta primo slug json disponibile
        $slug = Post::getSlug($title);
        return response()->json([
            'slug' => $slug
        ]);
    }
}
