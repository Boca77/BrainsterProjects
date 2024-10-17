@extends('layout.main')

@include('layout.nav')

@section('content')
    <form action="" method="">
        <div class="row">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" placeholder="Title">
            </div>
        </div>
        <button class="btn btn-success">Add</button>
    </form>
@endsection
