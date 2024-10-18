<?php

namespace App\Http\Controllers;

use App\Models\GeneralInfo;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GeneralInfo $generalInfo)
    {
        $generalInfo->load('social_media');
        $generalInfo->load('employs');
        return view('settings', compact('generalInfo'));
    }

    public function update(Request $request)
    {

        $request->validate([
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $generalInfo = GeneralInfo::find(1);

        if ($request->hasFile('hero_image')) {

            $heroImagePath = $request->file('hero_image')->store('hero_images');
            $generalInfo->hero_image = $heroImagePath;
        }

        foreach ($request->social_media as $platform => $url) {
            $socialMedia = $generalInfo->social_media()->where('platform', $platform)->first();
            if ($socialMedia) {
                $socialMedia->update(['url' => $url]);
            }
        }

        $generalInfo->save();

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
