@extends('layout.main')

@include('layout.nav')

@section('content')
    <div class="row">
        <div class="col-1">
            <h1>Blogs</h1>
        </div>
        <div class="col-5">
            <a href="{{ route('blog.create') }}" class="btn w-25 btn-success my-2  ">
                Add Blog
            </a>
        </div>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>
    @foreach ($blogs as $blog)
        <div class="row d-flex align-items-center border border-2 rounded my-2 shadow">

            <a href="{{ route('blog.show', ['blog' => $blog->id]) }}" class="text-decoration-none text-black">
                <div class="row d-flex align-items-center p-3 ">
                    <div class="col-4">
                        <h2 class="h4">{{ $blog->title }}</h2>
                        <p>{{ $blog->sub_title }}</p>
                    </div>

                    <div class="col-4">
                        <p>{{ substr($blog->content, 0, 500) }}...</p>
                    </div>
                    <div class="col-4 text-center">
                        <p>{{ $blog->user->name }}</p>
                    </div>
                </div>
            </a>

            <div class="row border-top text-center">
                <div class="col">
                    <form action="{{ route('blog.delete', ['blog' => $blog->id]) }}" method="POST" class="mb-0 d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger w-25 my-2">Delete</button>
                    </form>
                    <a href="{{ route('blog.edit', ['blog' => $blog->id]) }}" class="btn w-25 btn-warning my-2  ">
                        Edit
                    </a>
                </div>
            </div>


        </div>
    @endforeach
@endsection
