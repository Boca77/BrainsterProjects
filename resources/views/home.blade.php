@extends('layout.main')

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row">
            <div class="col text-center">
                <h1>Welcome to the admin Dashboard</h1>
                <a href="{{ route('login.form') }}" class="btn btn-primary px-3 py-2">Log in as Admin</a>
            </div>
        </div>
    </div>
@endsection
