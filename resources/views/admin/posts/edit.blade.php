@extends('layouts.app')
@section('title', 'Modifica un post')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" action="{{ route('admin.posts.update', ['post' =>$post])}}"
    class="post-container" enctype="multipart/form-data">
    @csrf()
    @method('PUT')
    <div class="mb-3">
        <div id="" class="form-text"><h5 class="title-div">Slug</h5></div>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{$post->slug}}">
        <div class="invalid-feedback">
            @error('slug')
                <ul>
                @foreach ($errors->get('slug') as $error)
                    <li />{{$error}}
                @endforeach
                </ul>
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <div id="" class="form-text"><h5 class="title-div">Title</h5></div>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{$post->title}}">
        <div class="invalid-feedback">
            @error('title')
                <ul>
                @foreach ($errors->get('title') as $error)
                    <li />{{$error}}
                @endforeach
            </ul>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="category" class="from-label">Category</label>
        <select class="form-select @error('category_id') is-invalid @enderror"
        id="category" name="category_id">
            @foreach($categories as $category)
                <option value="{{$category->id}}"
                    @if ($category->id == old('category_id', $post->category->id))
                    selected @endif>
                    {{$category->name}}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            @error('category_id')
                <ul>
                @foreach ($errors->get('category_id') as $error)
                    <li />{{$error}}
                @endforeach
                </ul>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <div class="tags-div">
            <label for="tags-title" class="from-label">Tags</label>
            @foreach ($tags as $tag)
                <div class="form-check">
                    <label class="form-check-label" for='tag-{{$tag->id}}'>{{$tag->name}}</label>
                    <input id='tag-{{$tag->id}}'
                    class="form-check-input"
                    type="checkbox" value="{{$tag->id}}" name="tags[]"
                    @if (in_array($tag->id, old('tags', $post->tags->pluck('id')->all()))) checked @endif>
                </div>
            @endforeach
            @if ($errors->has('tags') || $errors->has('tags.*'))
                <div>
                    There seems to be some problems with the tags
                </div>
            @endif
        </div>
    </div>

    <div class="mb-3">
        <div id="" class="form-text"><h5 class="title-div">Url Image</h5></div>
        <input type="url" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image')}}">
        <div class="invalid-feedback">
            @error('image')
                <ul>
                @foreach ($errors->get('image') as $error)
                    <li />{{$error}}
                @endforeach
                </ul>
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <div id="" class="form-text">Upload Image</div>
        <input type="file" class="form-control @error('uploaded_img') is-invalid @enderror"
        id="uploaded_img" name="uploaded_img">
        <div class="invalid-feedback">
            @error('uploaded_img')
                <ul>
                @foreach ($errors->get('uploaded_img') as $error)
                    <li />{{$error}}
                @endforeach
                </ul>
            @enderror
        </div>
        <div>
            @if ($post->uploaded_img)
                <img src="{{ asset('storage/' . $post->uploaded_img) }}" alt="{{$post->title}}" class="img-preview-edit">
            @else
                <img src="{{$post->image}}" alt="{{$post->title}}" class="img-preview-edit">
            @endif
        </div>
    </div>
    <div class="mb-3">
        <div id="" class="form-text"><h5 class="title-div">Description</h5></div>
        <textarea type="text" class="form-control @error('content') is-invalid @enderror" id="content" name="content"
        value="{{old('content')}}" rows="5" cols="30"></textarea>
        <div class="invalid-feedback">
            @error('content')
                <ul>
                @foreach ($errors->get('content') as $error)
                    <li />{{$error}}
                @endforeach
                </ul>
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <div id="" class="form-text"><h5 class="title-div">Excerpt</h5></div>
        <input type="text" class="form-control @error('except') is-invalid @enderror" id="except" name="except" value="{{$post->except}}">
        <div class="invalid-feedback">
            @error('except')
                <ul>
                @foreach ($errors->get('except') as $error)
                    <li />{{$error}}
                @endforeach
                </ul>
            @enderror
        </div>
    </div>
    <div class="buttons">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
<form action="{{route('admin.posts.destroy', ['post' => $post])}}" method="post" class="delete-btn">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger">Delete</button>
</form>
 @endsection
