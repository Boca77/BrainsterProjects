@extends('layout.main')

@include('layout.nav')

@section('content')
    <div>
        <div class="col">
            <h1>General Setting</h1>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('update.settings') }}" method="POST" class="mt-5">
                @csrf
                @method('PUT')

                <label for="hero" class="h3">Change Hero Image</label><br>
                <input type="file" name="hero_image" id="hero">

                <h3 class="mt-4">Social Media</h3>
                <div>
                    @foreach ($generalInfo->social_media as $social_media)
                        <label for="{{ $social_media->platform }}">{{ ucfirst($social_media->platform) }}</label>
                        <input required class="form-control" type="text"
                            name="social_media[{{ $social_media->platform }}]" value="{{ $social_media->url }}"
                            id="{{ $social_media->platform }}">
                    @endforeach
                </div>
                <button class="btn btn-success mt-5">Save Changes</button>
            </form>
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
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h2>Employees</h2>
            </div>
            <div class="col-12 col-md-6 text-md-end">
                <a href="{{ route('create.employee.settings') }}" class="btn btn-success my-2">
                    Add Employee
                </a>
            </div>

        </div>
        <div class="row">
            @foreach ($generalInfo->employees as $employee)
                <div class="col-lg-4 col-md-6 col-sm-12 p-3">
                    <div class="d-flex align-items-center flex-column rounded-top border py-3 shadow-lg">
                        <img class="rounded-circle" src="{{ asset('storage/' . $employee->image) }}"
                            style="width: 150px; height: 150px; object-fit: cover;" alt="">
                        <p class="mt-3 fw-bold">
                            {{ $employee->name }} {{ $employee->surname }}
                        </p>
                        <p class="mb-0">
                            {{ $employee->title }}
                        </p>
                    </div>
                    <div class="buttons d-flex gap-2 border p-2 bg-white justify-content-center">
                        <form class="mb-0"
                            action=" {{ route('delete.employee.settings', ['employee' => $employee->id]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>

                        <form class="mb-0" action="{{ route('edit.employee.settings', ['employee' => $employee->id]) }}"
                            method="PUT">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-warning">Edit</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
