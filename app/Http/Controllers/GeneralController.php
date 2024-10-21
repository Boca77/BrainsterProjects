<?php

namespace App\Http\Controllers;

use App\Models\GeneralInfo;
use App\Models\GeneralMembers;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GeneralInfo $generalInfo)
    {
        $generalInfo->load('social_media');
        $generalInfo->load('employees');
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
    public function createEmployee()
    {
        return view('add.employee');
    }

    public function editEmployee(GeneralMembers $employee)
    {

        return view('edit.employee', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addEmployee(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'general_info_id' => 'required|integer|exists:general_infos,id',
        ]);

        // Extract other data except image
        $data = $request->except('image');

        // Store the image in the 'public' disk
        $path = $request->file('image')->store('employee_images', 'public');

        // Add the image path to the data array
        $data['image'] = $path;

        // Create the new member record in the database
        GeneralMembers::create($data);

        // Redirect back with success message
        return redirect()->route('settings', $request->general_info_id)
            ->with('success', 'Employee added successfully!');
    }
    public function updateEmployee(Request $request, GeneralMembers $employee)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'general_info_id' => 'required|integer|exists:general_infos,id',
        ]);

        // Extract other data except image
        $data = $request->except('image');

        // Store the image in the 'public' disk
        $path = $request->file('image')->store('employee_images', 'public');

        // Add the image path to the data array
        $data['image'] = $path;


        $employee->update($data);
        $employee->load('generalInfo');

        return redirect()->route('settings', $employee->generalInfo->id)->with('success', 'Employee edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteEmployee(GeneralMembers $employee)
    {
        $employee->load('generalInfo');
        $employee->delete();
        return redirect()->route('settings', $employee->generalInfo->id)->with('success', 'Employee deleted successfully!');
    }
}
