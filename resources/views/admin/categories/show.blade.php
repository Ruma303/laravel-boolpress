@extends('layouts.app')
@section('content')
<div class="category-container">
    <h2 class="category">{{$category->name}}</h2>
    <p class="content">{{$category->description}}</p>
    <ul>
        <div class="row">
            @foreach ($posts as $post)
            <li>
                <div class="card">
                    <span>{{$post->id}}</span><a href="{{route('admin.posts.show', ['post' => $post])}}">{{$post->title}}</a>
                    <img src="{{ ($post->uploaded_img) ? asset('storage'. $post->uploaded_img) : $post->image}}"
                    class="card-img-top" alt="{{$post->title}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->except}}</p>
                        <a href="{{route('admin.posts.show', ['post' => $post])}}" class="btn btn-primary">Read</a>
                    </div>
                </div>
            </li>
            @endforeach
        </div>
    </ul>
    <div class="buttons">
        <a class="btn btn-warning"
        href="{{route('admin.categories.edit', ['category' => $category])}}">
        Edit</a>
        <form action="{{route('admin.categories.destroy', ['category' => $category])}}" method="category">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>
    {{$posts->links()}}
</div>
@endsection
