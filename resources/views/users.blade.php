@extends('layout.main')

@include('layout.nav')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <div class="row">
            @foreach ($users as $user)
                <div class="col-lg-4 col-md-6 col-sm-12 p-3">
                    <a href="{{ route('user.show', ['user' => $user->id]) }}" class="text-decoration-none text-black">
                        <div class="d-flex align-items-center flex-column rounded-top border py-3 shadow-lg">
                            <img class="rounded-circle" src="{{ asset($user->photo_upload) }}"
                                style="width: 150px; height: 150px; object-fit: cover;" alt="">
                            <p @class(['mt-3', 'fw-bold', 'text-danger' => $user->is_banned])>
                                {{ $user->name }} {{ $user->surname }}
                            </p>
                        </div>
                    </a>

                    <div class="buttons d-flex gap-2 border p-2 bg-white justify-content-center">
                        <form class="mb-0" action="{{ route('user.delete', ['user' => $user->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>

                        <form class="mb-0" action="{{ route('user.ban', ['user' => $user->id]) }}" method="POST">
                            @csrf
                            <button class="btn btn-warning">Ban</button>
                        </form>

                        @if ($user->is_banned)
                            <form class="mb-0" action="{{ route('user.unban', ['user' => $user->id]) }}" method="POST">
                                @csrf
                                <button class="btn btn-success">Unban</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
