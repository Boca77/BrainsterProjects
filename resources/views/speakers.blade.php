@extends('layout.main')

@include('layout.nav')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col">
            <h1>Event Speakers</h1>
            <a href="{{ route('speaker.event.create') }}" class="btn btn-success ">Add an Event Speaker</a>
        </div>
    </div>
    @foreach ($eventSpeakers as $speaker)
        <div class="col-4 p-3" id="event">

            <div class="d-flex align-items-center flex-column rounded-top border py-3 shadow-lg">
                <img class="rounded-circle" src="{{ asset($speaker->image) }}"
                    style="width: 150px; height: 150px; object-fit: cover;" alt="">
                <p class="mt-3 fw-bold">{{ $speaker->name }} {{ $speaker->surname }}</p>
                <p class="">
                    Speker in events: <br>
                    @forelse ($speaker->events as $event)
                        {{ $event->title }}
                        @if ($loop->last)
                        @else
                            ,
                        @endif
                    @empty
                        no events
                    @endforelse

                </p>
                <p class="">{{ $speaker->email }}</p>
                <p class="text-secondary">Special Guest
                    @if ($speaker->special_guest)
                        Yes
                    @else
                        No
                    @endif
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
    <hr>

    <div class="row">
        <div class="col">
            <h1>Conference Speakers</h1>
            <a href="{{ route('speaker.conference.create') }}" class="btn btn-success ">Add a Conference Speaker</a>
        </div>
    </div>
    @foreach ($conferenceSpeakers as $speaker)
        <div class="col-4 p-3" id="conference">

            <div class="d-flex align-items-center flex-column rounded-top border py-3 shadow-lg">
                <img class="rounded-circle" src="{{ asset($speaker->image) }}"
                    style="width: 150px; height: 150px; object-fit: cover;" alt="">
                <p class="mt-3 fw-bold">{{ $speaker->name }} {{ $speaker->surname }}</p>
                <p class="">
                    Speker in conference: <br>
                    @forelse ($speaker->conference as $conference)
                        {{ $conference->title }}
                        @if ($loop->last)
                        @else
                            ,
                        @endif
                    @empty
                        no conferences
                    @endforelse

                </p>
                <p class="">{{ $speaker->email }}</p>
                <p class="text-secondary">Special Guest
                    @if ($speaker->special_guest)
                        Yes
                    @else
                        No
                    @endif
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
@endsection
