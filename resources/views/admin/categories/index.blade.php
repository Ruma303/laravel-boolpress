@extends('layouts.app')
@section('content')
    @if(session('deleted'))
        <div class="alert alert-success">
La categoria {{ session('deleted')->name }} "{{ session('deleted')->name }}" è stata correttamente eliminata.
        </div>
    @endif
<h1 class="index-title">Categories</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col col-title">ID</th>
            {{-- <th scope="col col-title">Num. Posts</th> --}}
            <th scope="col col-title">Slug</th>
            <th scope="col col-title">Name</th>
            <th scope="col col-title">Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                {{-- Numero di posts per categorie --}}
                {{-- <td>
                    @for ($i=0; $i<$category->posts; $i++)
                        {{count($category->posts)}}
                    @endfor
                </td> --}}
                <td>{{ $category->slug }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td class="category-buttons">
                    <a class="btn btn-primary"
                    href="{{route('admin.categories.show', ['category' => $category])}}">
                    More</a>

                    <a class="btn btn-warning"
                    href="{{route('admin.categories.edit', ['category' => $category])}}">
                    Edit</a>
                    <form action="{{route('admin.categories.destroy', ['category' => $category])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
@endsection
