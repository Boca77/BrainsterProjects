@extends('layout.main')

@include('layout.nav')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif



    <div class="row mb-4">
        <div class="col d-flex justify-content-between align-items-center">
            <h1>Event Speakers</h1>
            <a href="{{ route('speaker.event.create') }}" class="btn btn-success">Add an Event Speaker</a>
        </div>
    </div>

    <div class="row">
        @foreach ($eventSpeakers as $speaker)
            <div class="col-lg-4 col-md-6 col-sm-12 p-3" id="event">
                <div class="d-flex align-items-center flex-column rounded-top border py-3 shadow-lg">
                    <img class="rounded-circle" src="{{ asset('storage/' . $speaker->image) }}"
                        style="width: 150px; height: 150px; object-fit: cover;" alt="Speaker image">
                    <p class="mt-3 fw-bold">{{ $speaker->name }} {{ $speaker->surname }}</p>
                    <p>
                        Speaker in events: <br>
                        @forelse ($speaker->events as $event)
                            {{ $event->title }}{{ !$loop->last ? ',' : '' }}
                        @empty
                            no events
                        @endforelse
                    </p>
                    <p class="">{{ $speaker->email }}</p>
                    <p class="text-secondary">
                        Special Guest: {{ $speaker->special_guest ? 'Yes' : 'No' }}
                    </p>
                </div>

                <div class="buttons d-flex gap-2 border p-2 bg-white justify-content-center">
                    <form class="mb-0" action="{{ route('speaker.event.delete', ['eventSpeaker' => $speaker->id]) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('speaker.event.edit', ['eventSpeaker' => $speaker->id]) }}"
                        class="btn btn-warning">Edit</a>
                </div>
            </div>
        @endforeach
    </div>

    <hr class="my-5">

    <div class="row mb-4">
        <div class="col d-flex justify-content-between align-items-center">
            <h1>Conference Speakers</h1>
            <a href="{{ route('speaker.conference.create') }}" class="btn btn-success">Add a Conference Speaker</a>
        </div>
    </div>

    <div class="row">
        @foreach ($conferenceSpeakers as $speaker)
            <div class="col-lg-4 col-md-6 col-sm-12 p-3" id="conference">
                <div class="d-flex align-items-center flex-column rounded-top border py-3 shadow-lg">
                    <img class="rounded-circle" src="{{ asset('storage/' . $speaker->image) }}"
                        style="width: 150px; height: 150px; object-fit: cover;" alt="Speaker image">
                    <p class="mt-3 fw-bold">{{ $speaker->name }} {{ $speaker->surname }}</p>
                    <p>
                        Speaker in conferences: <br>
                        @forelse ($speaker->conference as $conference)
                            {{ $conference->title }}{{ !$loop->last ? ',' : '' }}
                        @empty
                            no conferences
                        @endforelse
                    </p>
                    <p class="">{{ $speaker->email }}</p>
                    <p class="text-secondary">
                        Special Guest: {{ $speaker->special_guest ? 'Yes' : 'No' }}
                    </p>
                </div>

                <div class="buttons d-flex gap-2 border p-2 bg-white justify-content-center">
                    <form class="mb-0"
                        action="{{ route('speaker.conference.delete', ['conferenceSpeaker' => $speaker->id]) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('speaker.conference.edit', ['conferenceSpeaker' => $speaker->id]) }}"
                        class="btn btn-warning">Edit</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
