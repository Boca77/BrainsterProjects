@extends('layout.main')

@include('layout.nav')

@section('content')
    <h1>Add Event Speaker</h1>
    <form action="{{ route('speaker.event.store') }}" method="POST" class="mt-5" enctype="multipart/form-data">
        @csrf
        {{-- Use POST method to store new speaker --}}

        <div class="row">
            <div class="col">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    placeholder="Name" id="name" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="surname">Surname</label>
                <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname"
                    placeholder="Surname" id="surname" value="{{ old('surname') }}">
                @error('surname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="image">Upload Image</label>
                <input class="mt-3" type="file" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    placeholder="Email" id="email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    placeholder="Title" id="title" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="social_media">Social Media</label>
                <input type="text" class="form-control @error('social_media') is-invalid @enderror" name="social_media"
                    placeholder="Social Media" id="social_media" value="{{ old('social_media') }}">
                @error('social_media')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h3 class="mt-3">Is the speaker a special guest?</h3>
                <label for="yes">Yes</label>
                <input type="radio" value="1" name="special_guest" id="yes"
                    {{ old('special_guest') == 1 ? 'checked' : '' }}>
                <label for="no">No</label>
                <input type="radio" value="0" name="special_guest" id="no"
                    {{ old('special_guest') == 0 ? 'checked' : '' }}>
                @error('special_guest')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button class="btn btn-warning w-100 mt-5">Add Speaker</button>
    </form>
@endsection
