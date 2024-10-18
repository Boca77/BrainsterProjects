@extends('layout.main')

@include('layout.nav')

@section('content')
    <form action="{{ route('agenda.conference.update', ['agenda' => $agenda->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                    value="{{ old('title', $agenda->title) }}">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date"
                    value="{{ old('date', $agenda->date) }}">
            </div>
        </div>

        <input type="text" hidden value="{{ $agenda->annual_conference_id }}" name="annual_conference_id">
        <input type="text" hidden value="1" name="is_conference">

        <button class="btn btn-success mt-3">Update</button>

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
