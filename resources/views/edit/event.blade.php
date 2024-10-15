@extends('layout.main')

@include('layout.nav')

@section('content')
    <h1>Edit Event</h1>

    <form action="{{ route('event.update', ['event' => $event->id]) }}" method="POST" class="mt-5">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $event->title) }}" placeholder="Title" id="title">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="theme">Theme</label>
                <input type="text" name="theme" class="form-control @error('theme') is-invalid @enderror"
                    value="{{ old('theme', $event->theme) }}" placeholder="Theme" id="theme">
                @error('theme')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <label for="description">Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="Description"
                    cols="30" rows="5">{{ old('description', $event->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="objective">Objective</label>
                <textarea name="objective" class="form-control @error('objective') is-invalid @enderror" id="objective" cols="30"
                    rows="5">{{ old('objective', $event->objective) }}</textarea>
                @error('objective')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <label for="date">Date</label>
                <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                    value="{{ old('date', $event->date) }}" placeholder="Date" id="date">
                @error('date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control @error('location') is-invalid @enderror"
                    value="{{ old('location', $event->location) }}" placeholder="location" id="location">
                @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <label for="price">Price</label>
                <input type="price" name="price" class="form-control @error('price') is-invalid @enderror"
                    value="{{ old('price', $event->price) }}" placeholder="Price" id="price">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button class="btn btn-warning w-100 mt-5">Edit</button>
    </form>
@endsection

{{-- $table->string('title');
$table->string('theme');
$table->mediumText('description');
$table->string('objective');
$table->tinyText('agenda');
$table->date('date');
$table->string('location');
$table->integer('price'); --}}
