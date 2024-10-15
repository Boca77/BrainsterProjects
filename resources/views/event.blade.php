@extends('layout.main')

@include('layout.nav')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="border border-2 rounded p-4">
        <div class="border-bottom">
            <h1>{{ $event->title }}</h1>
            <h4>{{ $event->theme }}</h4>
        </div>
        <p class="mt-5">{{ $event->description }}</p>
        <p class="mt-2">{{ $event->objective }}</p>
        <p class="text-secondary mt-4">Location: {{ $event->location }}</p>
        <p class="text-secondary mt-4">Date: {{ $event->date }}</p>
        <p class="text-secondary mt-4">Price: {{ $event->price }}</p>
        <div class="col border-top">
            <form action="{{ route('event.delete', ['event' => $event->id]) }}" method="POST" class="mb-0">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger m-2">Delete</button>
                <a href="{{ route('event.edit', ['event' => $event->id]) }}" class="btn btn-warning my-2  ">
                    Edit
                </a>
            </form>
        </div>
    </div>
@endsection
