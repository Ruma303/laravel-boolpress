@extends('layouts.app')
@section('content')
    @if(session('deleted'))
        <div class="alert alert-success">
Il post {{ session('deleted')->id }} "{{ session('deleted')->title }}" è stato correttamente eliminato.
        </div>
    @endif
<h1 class="index-title">Posts</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col col-title">ID</th>
            <th scope="col col-title">Slug</th>
            <th scope="col col-title">Title</th>
            <th scope="col col-title">Category</th>
            <th scope="col col-title">Tags</th>
            <th scope="col col-title">Img</th>
            <th scope="col col-title">Except</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->title }}</td>
                <td>
                    @if($post->category)
                    <a href="{{route('admin.categories.show', ['category' => $post->category])}}">
                        {{ $post->category->name }}</a>
                    @endif
                </td>
                <td>
                    @foreach ($post->tags as $tag)
                        <a href="{{route('admin.tags.show', ['tag' => $tag])}}">
                        {{ $tag->name }}</a>{{$loop->last ? '': ', '}}
                    @endforeach
                </td>
                <td>
                    @if ($post->uploaded_img)
                        <img src="{{ asset('storage/' . $post->uploaded_img) }}" alt="{{$post->title}}" class="img-preview">
                    @else
                        <img src="{{$post->image}}" alt="{{$post->title}}" class="img-preview">
                    @endif
                </td>
                <td>{{ $post->except }}</td>
                <td>
                    <a class="btn btn-primary"
                    href="{{route('admin.posts.show', ['post' => $post])}}">
                    More</a>
                </td>
                <td>
                    <a class="btn btn-warning"
                    href="{{route('admin.posts.edit', ['post' => $post])}}">
                    Edit</a>
                </td>
                <td>
                    <form action="{{route('admin.posts.destroy', ['post' => $post])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
@endsection
