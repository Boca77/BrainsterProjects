@extends('layout.main')

@include('layout.nav')

@section('content')
    <h1>Edit Conference Speaker</h1>
    <form action="{{ route('speaker.conference.update', ['conferenceSpeaker' => $conferenceSpeaker->id]) }}" method="POST"
        class="mt-5" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                    value="{{ $conferenceSpeaker->name }}" name="name" placeholder="name" id="name">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="surname">Surname</label>
                <input type="text" class="form-control @error('surname') is-invalid @enderror"
                    value="{{ $conferenceSpeaker->surname }}" name="surname" placeholder="Surname" id="surname">
                @error('surname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="image">Upload Image</label>
                <input class="mt-3" type="file" id="image" name="image">
            </div>
            <div class="col">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ $conferenceSpeaker->email }}" name="email" placeholder="Email" id="email">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror"
                    value="{{ $conferenceSpeaker->title }}" name="title" placeholder="Title" id="title">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="social_media">Social Media</label>
                <input type="text" class="form-control @error('social_media') is-invalid @enderror"
                    value="{{ $conferenceSpeaker->social_media }}" name="social_media" placeholder="Subtitle"
                    id="social_media">
                @error('social_media')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h3 class="mt-3">Is the speaker a special guest?</h3>
                <label for="yes">Yes</label>
                <input type="radio" value="1" name="special_guest" id="yes">
                <label for="no">No</label>
                <input type="radio" value="0" name="special_guest" id="no">
            </div>
            <div class="col">

            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <button class="btn btn-warning w-100 mt-5">Edit</button>
    </form>
@endsection
