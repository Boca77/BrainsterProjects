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
            <h1>{{ $conference->title }}</h1>
        </div>
        <p class="mt-5">{{ $conference->description }}</p>
        <p class="text-secondary mt-4">Location: {{ $conference->location }}</p>
        <p class="text-secondary mt-4">Date: {{ $conference->date }}</p>
        <p class="text-secondary mt-4">Price: {{ $conference->price }}</p>
        <p class="text-secondary mt-4">Status: {{ $conference->status }}</p>
        <div class="col border-top">
            <form action="{{ route('conference.delete', ['conference' => $conference->id]) }}" method="POST"
                class="mb-0">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger m-2">Delete</button>
                <a href="{{ route('conference.edit', ['conference' => $conference->id]) }}" class="btn btn-warning my-2  ">
                    Edit
                </a>
            </form>
        </div>
    </div>
@endsection
