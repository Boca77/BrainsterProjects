@extends('layout.main')

@include('layout.nav')

@section('content')
    <h1>Add Blog</h1>
    <form action="{{ route('blog.store') }}" method="POST" class="mt-5">
        @csrf

        <div class="row">
            <div class="col">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                    name="title" placeholder="Title" id="title">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="sub_title">Subtitle</label>
                <input type="text" class="form-control @error('sub_title') is-invalid @enderror"
                    value="{{ old('sub_title') }}" name="sub_title" placeholder="Subtitle" id="sub_title">
                @error('sub_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <label for="content">Content</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" cols="30"
                    rows="5">{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <input type="hidden" name="created_by" value="{{ auth()->user()->id }}">

        <button class="btn btn-success w-100 mt-5">Add</button>
    </form>
@endsection
