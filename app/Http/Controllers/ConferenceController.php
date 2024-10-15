<?php

namespace App\Http\Controllers;

use App\Models\AnnualConference;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conferences = AnnualConference::all();
        return view('conferences', compact('conferences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add.conference');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showConference(AnnualConference $conference)
    {
        return view('conference', compact('conference'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(AnnualConference $conference)
    {
        $conference->delete();

        return redirect()->route('events')->with('success', 'Conference deleted successfully!');
    }
}
