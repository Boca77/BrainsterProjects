<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Models\AgendaContent;
use App\Models\AnnualConference;
use App\Models\ConferenceSpeaker;

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
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        if ($data['date'] <= now()) {
            $data['status'] = 'finished';
        } else {
            $data['status'] = 'upcoming';
        };

        AnnualConference::create($data);

        return redirect()->route('conferences')->with('success', 'Conference created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function showConference(AnnualConference $conference)
    {
        $conference->load('speakers');

        return view('conference', compact('conference'));
    }

    public function showAssign(AnnualConference $conference)
    {
        $speakers = ConferenceSpeaker::all();

        return view('add.assign-conference-speaker', compact('speakers', 'conference'));
    }

    public function assignSpeaker(Request $request)
    {

        $request->validate([
            'conference_speaker_id' => 'required|exists:conference_speakers,id',
            'conference_id' => 'required|exists:annual_conferences,id',
        ]);

        $conference = AnnualConference::findOrFail($request->conference_id);

        $conference->speakers()->attach($request->conference_speaker_id);

        return redirect()->route('conference.show', ['conference' => $conference->id])->with('success', 'Speaker assigned successfully!');
    }

    public function showAgenda(AnnualConference $conference)
    {
        $agendas = Agenda::query()->with('agenda_contents')->where('annual_conference_id', '=', $conference->id)->get();

        return view('agenda-conference', compact('agendas', 'conference'));
    }

    public function showEditAgendaForm(AnnualConference $conference, Agenda $agenda)
    {
        return view('edit.agenda-conference', compact('conference', 'agenda'));
    }

    public function showAgendaForm(AnnualConference $conference)
    {
        return view('add.agenda-conference', compact('conference'));
    }

    public function showAgendaContentForm(Agenda $agenda)
    {
        return view('add.agenda-conference-content', compact('agenda'));
    }

    public function editContent(Agenda $agenda, AgendaContent $content)
    {
        return view('edit.agenda-conference-content', compact('agenda', 'content'));
    }

    public function addAgenda(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'title' => 'required',
            'annual_conference_id' => 'required|exists:annual_conferences,id',
        ]);

        Agenda::create($request->all());

        return redirect()->route('agenda.conference.show', ['conference' => $request->annual_conference_id]);
    }

    public function updateAgenda(Request $request, Agenda $agenda)
    {
        $request->validate([
            'date' => 'required',
            'title' => 'required',
            'annual_conference_id' => 'required|exists:annual_conferences,id',
        ]);

        $agenda->update($request->all());

        return redirect()->route('agenda.conference.show', ['conference' => $request->annual_conference_id]);
    }

    public function updateContent(Request $request, AgendaContent $content)
    {
        $request->validate([
            'time' => 'required',
            'sub_title' => 'required',
            'agenda_id' => 'required|exists:agendas,id',
        ]);

        $content->update($request->all());

        return redirect()->back();
    }

    public function deleteAgenda(Agenda $agenda)
    {
        $agenda->delete();
        return redirect()->back();
    }

    public function deleteContent(AgendaContent $content)
    {
        $content->delete();
        return redirect()->back();
    }

    public function addAgendaContent(Request $request)
    {
        $request->validate([
            'time' => 'required',
            'sub_title' => 'required',
            'agenda_id' => 'required|exists:agendas,id',
        ]);

        AgendaContent::create($request->all());

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnnualConference $conference)
    {
        return view('edit.conference', compact('conference'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnnualConference $conference)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        if ($data['date'] <= now()) {
            $data['status'] = 'finished';
        } else {
            $data['status'] = 'upcoming';
        };

        $conference->update($data);

        return redirect()->route('conference.show', ['conference' => $conference])->with('success', 'Conference edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(AnnualConference $conference)
    {
        $conference->delete();

        return redirect()->route('conferences')->with('success', 'Conference deleted successfully!');
    }
}
