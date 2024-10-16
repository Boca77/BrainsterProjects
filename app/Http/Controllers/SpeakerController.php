<?php

namespace App\Http\Controllers;

use App\Models\ConferenceSpeaker;
use App\Models\EventSpeaker;
use Illuminate\Http\Request;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventSpeakers = EventSpeaker::all();
        $conferenceSpeakers = ConferenceSpeaker::all();

        return view('speakers', compact('eventSpeakers', 'conferenceSpeakers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createEventSpeaker()
    {
        return view('add.event-speaker');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createConferenceSpeaker()
    {
        return view('add.conference-speaker');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeEventSpeaker(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email',
            'title' => 'nullable|string|max:255',
            'social_media' => 'nullable|string|max:255',
            'special_guest' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('speakers', 'public');
            $data['image'] = $filePath;
        }

        EventSpeaker::create($data);
        return redirect()->route('speakers')->with('success', 'Event speaker added successfully');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function storeConferenceSpeaker(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email',
            'title' => 'nullable|string|max:255',
            'social_media' => 'nullable|string|max:255',
            'special_guest' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('speakers', 'public');
            $data['image'] = $filePath;
        }

        ConferenceSpeaker::create($data);
        return redirect()->route('speakers')->with('success', 'Conference speaker added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editEventSpeaker(EventSpeaker $eventSpeaker)
    {
        return view('edit.event-speaker', compact('eventSpeaker'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editConferenceSpeaker(ConferenceSpeaker $conferenceSpeaker)
    {
        return view('edit.conference-speaker', compact('conferenceSpeaker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateConferenceSpeaker(Request $request, ConferenceSpeaker $conferenceSpeaker)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email',
            'title' => 'nullable|string|max:255',
            'social_media' => 'nullable|string|max:255',
            'special_guest' => 'required|boolean',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('speakers', 'public');
            $conferenceSpeaker->image = $filePath;
        }


        $conferenceSpeaker->update([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'title' => $request->input('title'),
            'social_media' => $request->input('social_media'),
            'special_guest' => $request->input('special_guest'),
        ]);

        return redirect()->route('speakers', $conferenceSpeaker->id)
            ->with('success', 'Conference speaker updated successfully');
    }

    public function updateEventSpeaker(Request $request, EventSpeaker $eventSpeaker)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email',
            'title' => 'nullable|string|max:255',
            'social_media' => 'nullable|string|max:255',
            'special_guest' => 'required|boolean',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('speakers', 'public');
            $eventSpeaker->image = $filePath;
        }


        $eventSpeaker->update([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'title' => $request->input('title'),
            'social_media' => $request->input('social_media'),
            'special_guest' => $request->input('special_guest'),
        ]);

        return redirect()->route('speakers', $eventSpeaker->id)
            ->with('success', 'Event speaker updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function deleteEventSpeaker(EventSpeaker $eventSpeaker)
    {
        $eventSpeaker->delete();

        return redirect()->back()->with('success', 'Speaker deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteConferenceSpeaker(ConferenceSpeaker $conferenceSpeaker)
    {
        $conferenceSpeaker->delete();

        return redirect()->back()->with('success', 'Speaker deleted successfully');
    }
}
