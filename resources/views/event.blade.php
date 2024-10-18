@extends('layout.main')

@include('layout.nav')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="border border-2 rounded p-4">
        <div class="border-bottom mb-3">
            <h1>{{ $event->title }}</h1>
            <h4>{{ $event->theme }}</h4>
        </div>
        <p class="mt-3">{{ $event->description }}</p>
        <p class="mt-2">{{ $event->objective }}</p>
        <p class="text-secondary mt-4">Location: {{ $event->location }}</p>
        <p class="text-secondary mt-4">Date: {{ $event->date }}</p>
        <p class="text-secondary mt-4">Price: {{ $event->price }}</p>
        <div class="border-top pt-3">
            <form action="{{ route('event.delete', ['event' => $event->id]) }}" method="POST" class="mb-0">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger m-2">Delete</button>
                <a href="{{ route('event.edit', ['event' => $event->id]) }}" class="btn btn-warning my-2">
                    Edit
                </a>
                <a href="{{ route('agenda.event.show', ['event' => $event->id]) }}" class="btn btn-primary my-2">
                    View agenda
                </a>
            </form>
        </div>
    </div>

    <div class="border border-2 p-4 rounded mt-4">
        <div class="row mb-3">
            <div class="col-12 col-md-6">
                <h1>Speaker List</h1>
            </div>
            <div class="col-12 col-md-6 text-md-end">
                <a href="{{ route('speaker.event.assign.form', ['event' => $event->id]) }}" class="btn btn-success my-2">
                    Assign a Speaker
                </a>
            </div>
        </div>
        @forelse ($event->speakers as $speaker)
            <div class="p-2 row d-flex align-items-center border-bottom">
                <div class="col-12 col-md-4">
                    <p class="mb-0">{{ $speaker->name }} {{ $speaker->surname }}</p>
                </div>
                <div class="col-12 col-md-4 d-flex justify-content-center">
                    <p class="mb-0">{{ $speaker->email }}</p>
                </div>
            </div>
        @empty
            <p>No speakers assigned to this event</p>
        @endforelse
    </div>
@endsection
