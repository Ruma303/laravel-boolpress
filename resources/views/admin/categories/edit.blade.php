@extends('layouts.app')
@section('title', 'Modifica una categoria')
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
<form method="category" action="{{ route('admin.categories.update', ['category' =>$category])}}"
    class="category-container" enctype="multipart/form-data">
    @csrf()
    @method('PUT')
    <div class="mb-3">
        <div id="" class="form-text"><h5 class="title-div">Slug</h5></div>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{$category->slug}}">
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
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$category->name}}">
        <div class="invalid-feedback">
            @error('name')
                <ul>
                @foreach ($errors->get('name') as $error)
                    <li />{{$error}}
                @endforeach
            </ul>
            @enderror
        </div>
    </div>
{{--     <div class="mb-3">
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
    </div> --}}
    {{-- <div class="mb-3">
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
            @if ($category->uploaded_img)
                <img src="{{ asset('storage/' . $category->uploaded_img) }}" alt="{{$category->title}}" class="img-preview-edit">
            @else
                <img src="{{$category->image}}" alt="{{$category->title}}" class="img-preview-edit">
            @endif
        </div>
    </div> --}}
    <div class="mb-3">
        <div id="" class="form-text"><h5 class="title-div">Description</h5></div>
        <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description"
        value="{{old('description')}}" rows="5" cols="30"></textarea>
        <div class="invalid-feedback">
            @error('description')
                <ul>
                @foreach ($errors->get('description') as $error)
                    <li />{{$error}}
                @endforeach
                </ul>
            @enderror
        </div>
    </div>
    {{-- <div class="mb-3">
        <div id="" class="form-text"><h5 class="title-div">Excerpt</h5></div>
        <input type="text" class="form-control @error('except') is-invalid @enderror" id="except" name="except" value="{{$category->except}}">
        <div class="invalid-feedback">
            @error('except')
                <ul>
                @foreach ($errors->get('except') as $error)
                    <li />{{$error}}
                @endforeach
                </ul>
            @enderror
        </div>
    </div> --}}
    <div class="buttons">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
<form action="{{route('admin.categories.destroy', ['category' => $category])}}" method="category" class="delete-btn">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger">Delete</button>
</form>
 @endsection
