@extends('layout.main')

@include('layout.nav')

@section('content')
    <div>
        <h1>Agenda</h1>
        <a href="" class="btn btn-success"> Add Agenda</a>
    </div>

    @forelse ($agendas as $agenda)
        <div class="row border rounded mt-3">
            <div class="border-bottom pb-2 mb-3">
                <h2>{{ $agenda->title }}</h2>
                <p>{{ $agenda->date }}</p>
                <a href="" class="btn btn-success"> Add Content</a>
            </div>

            @forelse ($agenda->agenda_contents as $content)
                <div class="border-bottom mb-2 pb-2">
                    <div class="row">
                        <div class="col-1">
                            {{ $content->time }}
                        </div>
                        <div class="col-11">
                            <h4>{{ $content->sub_title }}</h4>
                            <p>{{ $content->description }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p>This event doesn't have an agenda.</p>
            @endforelse
        </div>
    @empty
        <p>No agendas available.</p>
    @endforelse
@endsection
