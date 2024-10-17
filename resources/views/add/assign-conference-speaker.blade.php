@extends('layout.main')

@include('layout.nav')

@section('content')
    <form action="{{ route('speaker.conference.assign') }}" method="POST">
        @csrf
        <h1>Assign a Speaker</h1>
        <select name="conference_speaker_id" class="form-select">
            <option selected>Select speaker</option>
            @foreach ($speakers as $speaker)
                <option value="{{ $speaker->id }}">{{ $speaker->name }} {{ $speaker->surname }}</option>
            @endforeach
        </select>

        <input type="text" hidden name="conference_id" value="{{ $conference->id }}">

        <div class="col mt-5">
            <button class="btn btn-success">Submit</button>
        </div>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
