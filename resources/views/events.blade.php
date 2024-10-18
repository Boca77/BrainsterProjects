@extends('layout.main')

@include('layout.nav')

@section('content')
    <div class="row gap-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1>Events</h1>
            <a href="{{ route('event.create') }}" class="btn btn-success my-2">
                Add Event
            </a>
        </div>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="row">
        @foreach ($events as $event)
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card" style="height: 300px">
                    <div class="card-header">
                        {{ $event->theme }}
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ substr($event->description, 0, 100) }}...</p>
                        <p class="card-text">{{ $event->location }} / {{ $event->date }}</p>
                        <div class="mt-auto">
                            <a href="{{ route('event.show', ['event' => $event->id]) }}" class="btn btn-primary">View
                                Event</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
