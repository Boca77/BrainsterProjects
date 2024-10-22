@extends('layout.main')

@include('layout.nav')

@section('content')
    <h1>Comments</h1>
    @foreach ($comments as $comment)
        <div class="row d-flex align-items-center border border-2 rounded my-2 shadow py-2">
            <div class="col-md-6">
                <h6><span class="text-secondary">Commented by:</span> {{ $comment->user->name }}</h6>
                <p>{{ $comment->content }}</p>
            </div>
            <div class="col-md-4">
                <h6><span class="text-secondary">Commented on:</span> <a
                        href="{{ route('blog.show', ['blog' => $comment->blog->id]) }}">{{ $comment->blog->title }}</a></h6>
                <p class="text-secondary">likes: {{ $comment->likes }}</p>
            </div>
            <div class="col-md-2 text-md-end">
                <form action="{{ route('comment.delete', ['comment' => $comment->id]) }}" method="POST" class="mb-0">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection
