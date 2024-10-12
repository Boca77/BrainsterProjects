@extends('layout.main')

@include('layout.nav')

@section('content')
    @foreach ($users as $user)
        <div class="col-4 p-3">
            <a href="" class="text-decoration-none text-black">
                <div class="d-flex align-items-center flex-column rounded border py-3 shadow-lg">
                    <img class="rounded-circle" src="{{ asset($user->photo_upload) }}"
                        style="width: 150px; height: 150px; object-fit: cover;" alt="">
                    <p class="mt-3 fw-bold">{{ $user->name }} {{ $user->surname }}</p>
                </div>
            </a>
        </div>
    @endforeach
@endsection
