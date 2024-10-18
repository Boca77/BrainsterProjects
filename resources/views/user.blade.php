@extends('layout.main')

@include('layout.nav')

@section('content')
    <div class="card mb-3" style="border-radius: .5rem;">
        <div class="row g-0">
            <div class="col-lg-4 col-md-12 p-5 text-center"
                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                <img src="{{ asset($user->photo_upload) }}" alt="Avatar" class="rounded-circle"
                    style="width: 150px; height: 150px; object-fit: cover;" alt="">
                <h5 class="mt-2">{{ $user->name }} {{ $user->surname }}</h5>
                <p>{{ $user->bio }}</p>
                <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card-body p-4">
                    <h6>Information</h6>
                    <hr class="mt-0 mb-4">
                    <div class="row pt-1">
                        <div class="col-sm-6 mb-3">
                            <h6>Email</h6>
                            <p class="text-muted">{{ $user->email }}</p>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <h6>Phone</h6>
                            <p class="text-muted">{{ $user->phone }}</p>
                        </div>
                    </div>

                    <div class="row pt-1">
                        <div class="col-sm-4 mb-3">
                            <h6>Country</h6>
                            <p class="text-muted">{{ $user->country }}</p>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <h6>City</h6>
                            <p class="text-muted">{{ $user->city }}</p>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <h6>Points</h6>
                            <p class="text-muted">{{ $user->acquired_points }}</p>
                        </div>
                    </div>

                    <div class="row pt-1">
                        <div class="col-sm-4 mb-3">
                            <form class="mb-0" action="{{ route('user.delete', ['user' => $user->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger w-100">Delete</button>
                            </form>
                        </div>

                        <div class="col-sm-4 mb-3">
                            <form class="mb-0" action="{{ route('user.ban', ['user' => $user->id]) }}" method="POST">
                                @csrf
                                <button class="btn btn-warning w-100">Ban</button>
                            </form>
                        </div>

                        <div class="col-sm-4 mb-3">
                            @if ($user->is_banned)
                                <form class="mb-0" action="{{ route('user.unban', ['user' => $user->id]) }}"
                                    method="POST">
                                    @csrf
                                    <button class="btn btn-success w-100">Unban</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="border border-2 p-4 rounded">
        <h1>Friend list</h1>
        @foreach ($user->friends as $friend)
            <div class="p-2 row d-flex align-items-center border-bottom">
                <div class="col-sm-4">
                    <p class="mb-0">{{ $friend->name }} {{ $friend->surname }}</p>
                </div>
                <div class="col-sm-4 text-center">
                    <p class="mb-0">{{ $friend->email }}</p>
                </div>
                <div class="col-sm-4">
                    <a href="{{ route('user.show', ['user' => $friend->id]) }}" class="btn btn-primary float-end">
                        View Profile
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
