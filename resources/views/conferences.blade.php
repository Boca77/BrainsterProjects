@extends('layout.main')

@include('layout.nav')

@section('content')
    <div class="row gap-3">
        <div class="col-2">
            <h1>Conferences</h1>
        </div>
        <div class="col-5">
            <a href="{{ route('conference.create') }}" class="btn btn-success my-2  ">
                Add Conference
            </a>
        </div>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>
    @foreach ($conferences as $conference)
        <div class="col-md-4 mb-3">
            <div class="card" style="height: 300px">
                <div class="card-header">
                    <h5>{{ $conference->title }}</h5>
                </div>
                <div class="card-body d-flex flex-column">
                    <p class="card-text">{{ substr($conference->description, 0, 100) }}...</p>
                    <p class="card-text">{{ $conference->location }} / {{ $conference->date }}</p>
                    <div class="mt-auto">
                        <a href="{{ route('conference.show', ['conference' => $conference->id]) }}" class="btn btn-primary">
                            View Conference
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    </div>
@endsection
