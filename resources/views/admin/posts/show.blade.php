@extends('layouts.app')
@section('content')
<div class="post-container">
    <h1>{{$post->title}}</h1>
    @if ($post->uploaded_img && $post->image)
        @if ($post->uploaded_img)
            <img src="{{ asset('storage/' . $post->uploaded_img) }}" alt="{{$post->title}}">
        @else
            <img src="{{$post->image}}" alt="{{$post->title}}">
        @endif
    @endif

    @if(isset($post->category->name))
        <h2 class="category">Category:
        <a href="{{route('admin.categories.show', ['category' => $post->category])}}">
            {{$post->category->name}}</a></h2>
    @endif

    @if($post->tags->all())
    <h2 class="tags">Tags</h2>
    <ul class="tags-div">
        @foreach ($post->tags as $tag)
            <a href="{{route('admin.tags.show', ['tag' => $tag])}}">
            {{ $tag->name }}</a>{{$loop->last ? '': ', '}}
        @endforeach
    </ul>
    @endif

    <p class="except">{{$post->except}}</p>
    <p class="content">{{$post->content}}</p>
    <div class="buttons">
        <div>
            <a class="btn btn-warning"
            href="{{route('admin.posts.edit', ['post' => $post])}}">
            Edit</a>
        </div>
        <div>
            <form action="{{route('admin.posts.destroy', ['post' => $post])}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
