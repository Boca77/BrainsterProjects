@extends('layout.main')

@include('layout.nav')

@section('content')
    <form action="{{ route('your.store.route') }}" method="POST" enctype="multipart/form-data" class="mt-5">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" required placeholder="Enter your name">
        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" required
                placeholder="Enter your title">
        </div>

        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea class="form-control" name="bio" id="bio" rows="4" required placeholder="Enter your bio"></textarea>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" name="image" id="image" accept="image/*" required>
        </div>

        <input type="text" hidden name="general_info_id" value="1" id="">

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection
