@extends('layouts.admin')

@section('css-style')
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Breadcrumbs -->
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-5">
                    <h3>Posts</h3>
                </div>
                <div class="col-7">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Posts</li>
                        <li class="breadcrumb-item active">Manage Post</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!--  -->
    <div>
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Edit Post</h5>
                        </div>
                        <div class="card-body">
                            <form class="theme-form" method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group mb-5">
                                    <img class="img-thumbnail" src="{{ $post->photo ? $post->photo->picture : '/storage/images/placeholder.png' }}" style="width:400px; height:350px;" alt="Image description">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label" for="title">Title</label>
                                    <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ $post->title }}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label" for="category_id">Category</label>
                                    <select class="js-example-basic-single col-sm-12 @error('category_id') is-invalid @enderror" name="category_id">
                                        <optgroup label="Available Categories">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label" for="photo_id">Photo</label>
                                    <input class="form-control  @error('photo_id') is-invalid @enderror" type="file" name="photo_id">
                                    @error('photo_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label" for="body">Description</label> @error('body')<i class="ion ion-asterisk text-danger"></i>@enderror
                                    <textarea class="form-control summernote  @error('body') is-invalid @enderror" name="body" rows="10">{{ $post->body }}</textarea>
                                    @error('body')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <button type="submit" class="btn btn-primary">Update Post</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-scripts')
    <!-- Jquery & Bootstrap Js -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('js/bundle.js') }}"></script>
    <script src="{{ asset('js/libs.js') }}"></script>
    <script src="{{ asset('js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('js/icons/feather-icon/feather-icon.js') }}"></script>
    <script src="{{ asset('js/icons/feather-icon/feather-icon-clipart.js') }}"></script>
@endsection