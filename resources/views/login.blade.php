@extends('layout.main')

@section('content')
    <div class="container d-flex align-items-center vh-100">
        <div class="row w-100">
            <div class="col-6 offset-3">
                <h1 class="display-1">Log In</h1>
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="password" class="mt-3">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 w-100">Submit</button>
                </form>

                @error('email')
                    <div class="alert text-danger fw-bold alert-danger mt-3">
                        {{ $message }}
                    </div>
                @enderror
                @if (session('error'))
                    <div class="alert text-danger fw-bold alert-danger mt-3">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
