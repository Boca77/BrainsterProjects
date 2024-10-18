@extends('layout.main')

@include('layout.nav')

@section('content')
    <form action="{{ route('agenda.content.conference.update', ['content' => $content->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="form-group">
                <label for="sub_title">Sub Title</label>
                <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="Sub Title"
                    value="{{ old('sub_title', $content->sub_title) }}">
            </div>
            <div class="form-group">
                <label for="time">Time</label>
                <input type="time" class="form-control" id="time" name="time" placeholder="Time"
                    value="{{ old('time', $content->time) }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{ old('description', $content->description) }}</textarea>
            </div>
        </div>
        <input type="text" hidden value="{{ $agenda->id }}" name="agenda_id">
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
