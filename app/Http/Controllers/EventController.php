<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventSpeaker;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();

        return view('events', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add.event');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'theme' => 'required|string|max:255',
            'description' => 'required|string',
            'objective' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        Event::create($request->all());

        return redirect()->route('events')->with('success', 'Event created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function showEvent(Event $event)
    {
        $event->load('speakers');

        return view('event', compact('event'));
    }

    public function showAssignForm(Event $event)
    {
        $speakers = EventSpeaker::all();

        return view('add.assign-event-speaker', compact('speakers', 'event'));
    }

    public function assignSpeaker(Request $request)
    {

        $request->validate([
            'event_speaker_id' => 'required|exists:event_speakers,id',
            'event_id' => 'required|exists:events,id',
        ]);


        $event = Event::findOrFail($request->event_id);


        $event->speakers()->attach($request->event_speaker_id);


        return redirect()->route('event.show', ['event' => $event->id])->with('success', 'Speaker assigned successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('edit.event', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'theme' => 'required|string|max:255',
            'description' => 'required|string',
            'objective' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);
        $event->update($request->all());

        return redirect()->route('event.show', ['event' => $event->id])->with('success', 'Event updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Event $event)
    {
        $event->delete();

        return redirect()->route('events')->with('success', 'Event deleted successfully!');
    }
}
