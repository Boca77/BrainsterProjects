@extends('layout.main')

@include('layout.nav')

@section('content')
    <form action="{{ route('agenda.event.add') }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" placeholder="Title">
            </div>
        </div>
        <input type="text" hidden value="{{ $event->id }}" name="event_id">
        <input type="text" hidden value='0' name="is_conference">
        <button class="btn btn-success mt-3">Add</button>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
@endsection
