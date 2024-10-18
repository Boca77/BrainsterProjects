@extends('layout.main')

@include('layout.nav')

@section('content')
    <div>
        <h1>Agenda</h1>
        <a href="{{ route('agenda.event.form', ['event' => $event->id]) }}" class="btn btn-success"> Add Agenda</a>

    </div>

    @forelse ($agendas as $agenda)
        <div class="row border rounded mt-3">
            <div class="border-bottom pb-2 mb-3">
                <h2>{{ $agenda->title }}</h2>
                <p>{{ $agenda->date }}</p>
                <a href="{{ route('agenda.content.event.form', ['agenda' => $agenda->id]) }}" class="btn btn-success"> Add
                    Content</a>
                <a href="{{ route('agenda.event.form.edit', ['event' => $event->id, 'agenda' => $agenda->id]) }}"
                    class="btn btn-warning"> Edit
                    Agenda</a>
                <form action="{{ route('agenda.event.delete', ['agenda' => $agenda->id]) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete Agenda</button>
                </form>
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
                            <div>
                                <a class="btn"
                                    href="{{ route('agenda.content.event.edit', ['agenda' => $content->agenda_id, 'content' => $content->id]) }}">Edit</a>
                                <form action="{{ route('agenda.content.event.delete', ['content' => $content->id]) }}"
                                    method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn">Delete</button>
                                </form>
                            </div>
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
