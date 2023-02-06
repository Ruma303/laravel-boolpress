@extends('layouts.app')
@section('content')
    @if(session('deleted'))
        <div class="alert alert-success">
Il Tag {{ session('deleted')->name }} "{{ session('deleted')->name }}" è stato correttamente eliminato.
        </div>
    @endif
<h1 class="index-title">Tags</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col col-title">ID</th>
            <th scope="col col-title">Slug</th>
            <th scope="col col-title">Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tags as $tag)
            <tr>
                <th scope="row">{{ $tag->id }}</th>
                <td>{{ $tag->slug }}</td>
                <td>{{ $tag->name }}</td>
                <td class="tag-buttons">
                    <a class="btn btn-primary"
                    href="{{route('admin.tags.show', ['tag' => $tag])}}">
                    More</a>

                    <a class="btn btn-warning"
                    href="{{route('admin.tags.edit', ['tag' => $tag])}}">
                    Edit</a>
                    <form action="{{route('admin.tags.destroy', ['tag' => $tag])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tags->links() }}
@endsection
