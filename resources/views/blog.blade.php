@extends('layout.main')

@include('layout.nav')

@section('content')
    <div class="border border-2 rounded p-4">
        <h1>{{ $blog->title }}</h1>
        <h4>{{ $blog->sub_title }}</h4>
        <p class="mt-5">{{ $blog->content }}</p>
        <p class="text-secondary mt-4">Created by {{ $blog->user->name }}</p>
        <div class="col border-top">
            <form action="{{ route('blog.delete', ['blog' => $blog->id]) }}" method="POST" class="mb-0">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger m-2">Delete</button>
                <a href="{{ route('blog.edit', ['blog' => $blog->id]) }}" class="btn btn-warning my-2  ">
                    Edit
                </a>
            </form>

        </div>
    </div>

    <div class="border border-2 rounded mt-5 p-2">
        <h3>Comments</h3>

        @foreach ($blog->comments as $comment)
            <div class="border-bottom mt-3">
                <h6>{{ $comment->user->name }}</h6>
                <p>{{ $comment->content }}</p>

                <form action="{{ route('comment.delete', ['comment' => $comment->id]) }}" method="POST" class="mb-0">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger m-2">Delete</button>
                </form>

            </div>
        @endforeach

    </div>
@endsection
