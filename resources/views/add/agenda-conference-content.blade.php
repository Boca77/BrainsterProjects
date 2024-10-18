@extends('layout.main')

@include('layout.nav')

@section('content')
    <form action="{{ route('agenda.content.conference.add') }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group">
                <label for="sub_title">Sub Title</label>
                <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="Sub Title">
            </div>
            <div class="form-group">
                <label for="time">Time</label>
                <input type="time" class="form-control" id="time" name="time" placeholder="time">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
            </div>
        </div>
        <input type="text" hidden value="{{ $agenda->id }}" name="agenda_id">
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
