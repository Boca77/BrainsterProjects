@extends('layout.main')

@include('layout.nav')

@section('content')
    <h1>Create Event</h1>

    <form action="{{ route('event.store') }}" method="POST" class="mt-5">
        @csrf

        <div class="row">
            <div class="col">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title') }}" placeholder="Title" id="title">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="theme">Theme</label>
                <input type="text" name="theme" class="form-control @error('theme') is-invalid @enderror"
                    value="{{ old('theme') }}" placeholder="Theme" id="theme">
                @error('theme')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <label for="description">Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="Description"
                    cols="30" rows="5">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="objective">Objective</label>
                <textarea name="objective" class="form-control @error('objective') is-invalid @enderror" id="objective" cols="30"
                    rows="5">{{ old('objective') }}</textarea>
                @error('objective')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <label for="date">Date</label>
                <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                    value="{{ old('date') }}" placeholder="Date" id="date">
                @error('date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control @error('location') is-invalid @enderror"
                    value="{{ old('location') }}" placeholder="Location" id="location">
                @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <label for="price">Price</label>
                <input type="number" step="0.01" name="price"
                    class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}"
                    placeholder="Price" id="price">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button class="btn btn-success w-100 mt-5">Create</button>
    </form>
@endsection
