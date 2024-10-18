@extends('layout.main')

@include('layout.nav')

@section('content')
    <form action="{{ route('your.update.route', $employ->id) }}" method="POST" enctype="multipart/form-data" class="mt-5">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" required placeholder="Enter your name"
                value="{{ old('name', $employ->name) }}">
        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" required placeholder="Enter your title"
                value="{{ old('title', $employ->title) }}">
        </div>

        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea class="form-control" name="bio" id="bio" rows="4" required placeholder="Enter your bio">{{ old('bio', $employ->bio) }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" name="image" id="image" accept="image/*">
        </div>

        <input type="hidden" name="general_info_id" value="1" id="">

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
@endsection
