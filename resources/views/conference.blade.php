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
                <a href="{{ route('conference.edit', ['conference' => $conference->id]) }}" class="btn btn-warning my-2">
                    Edit
                </a>
                <a href="{{ route('agenda.conference.show', ['conference' => $conference->id]) }}"
                    class="btn btn-primary my-2">
                    View agenda
                </a>
            </form>
        </div>
    </div>
    <div class="border border-2 p-4 rounded mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <h1>Speaker List</h1>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="{{ route('speaker.conference.assign.form', ['conference' => $conference->id]) }}"
                    class="btn btn-success my-2">
                    Assign a Speaker
                </a>
            </div>
        </div>
        @forelse ($conference->speakers as $speaker)
            <div class="p-2 row d-flex align-items-center border-bottom">
                <div class="col-4">
                    <p class="mb-0">{{ $speaker->name }} {{ $speaker->surname }}</p>
                </div>
                <div class="d-flex justify-content-center align-items-center col-4">
                    <p class="mb-0">{{ $speaker->email }}</p>
                </div>
            </div>
        @empty
            <p>No speakers assigned to this conference</p>
        @endforelse
    </div>
@endsection
