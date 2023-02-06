@extends('layouts.app')
@section('title', 'Crea una nuova categoria')
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
<form method="post" action="{{ route('admin.categories.store')}}" novalidate
enctype="multipart/form-data">
    @csrf()
    @method('POST')
    <div class="mb-3">
        <div id="" class="form-text">Slug</div>
        <input type="text"
        class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug')}}">
        {{-- <div class="col-3"><button type="submit" class="btn btn-primary">Generate Slug</button> --}}
        </div>
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
        <div id="" class="form-text">Title</div>
        <input type="text"
        class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
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
    <div class="mb-3">
        <div id="" class="form-text">Description</div>
        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{old('description')}}">
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
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

    {{-- <div class="mb-3">
        <label for="category" class="from-label">Category</label>
        <select class="form-select @error('category_id') is-invalid @enderror"
        id="category" name="category_id">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
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
    </div> --}}

    {{-- <div class="mb-3">
        <div id="" class="form-text">URL Image</div>
        <input type="url"
        class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image')}}">
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
    </div> --}}

    {{-- <div class="mb-3">
        <div id="" class="form-text">Except</div>
        <input type="text" class="form-control @error('except') is-invalid @enderror" id="except" name="except" value="{{old('except')}}">
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
