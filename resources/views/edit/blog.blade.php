@extends('layout.main')

@include('layout.nav')

@section('content')
    <h1>Edit Blog</h1>

    <form action="{{ route('blog.update', ['blog' => $blog->id]) }}" method="POST" class="mt-5">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $blog->title) }}" placeholder="Title" id="title">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="subtitle">Subtitle</label>
                <input type="text" name="sub_title" class="form-control @error('sub_title') is-invalid @enderror"
                    value="{{ old('sub_title', $blog->sub_title) }}" placeholder="Subtitle" id="subtitle">
                @error('sub_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <label for="content">Content</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" cols="30"
                    rows="5">{{ old('content', $blog->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="created_by">Created By</label>
                <input type="text" disabled name="created_by" class="form-control" value="{{ $blog->user->name }}"
                    placeholder="user">
            </div>
        </div>

        <button class="btn btn-warning w-100 mt-5">Edit</button>
    </form>
@endsection
