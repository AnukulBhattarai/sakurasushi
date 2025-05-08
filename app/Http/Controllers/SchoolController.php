<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $school = School::latest()->simplePaginate(15);
        return view('admin.pages.school.index', ['school' => $school]);
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
        $request->validate([
            'name' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'nullable|url',
        ]);
        // dd($request->all());
        $image = $request->file('thumbnail');
        $profile = time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('schools', $profile, 'public');

        $school = School::create([
            'name' => $request->name,
            'thumbnail' => $path,
            'link' => $request->link,
        ]);
        return redirect()->route('school.index')->withSuccess('The school has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        return view('admin.pages.school.edit', ['school' => $school]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'nullable|url',
        ]);

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $profile = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('schools', $profile, 'public');
            $school->update(['thumbnail' => $path]);
        }

        $school->update([
            'name' => $request->name,
            'link' => $request->link,
        ]);
        return redirect()->route('school.index')->withSuccess('The school has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        Storage::disk('public')->delete($school->thumbnail);
        $school->delete();
        return redirect()->route('school.index')->withSuccess('The school has been deleted');
    }

    public function change_status(Request $request)
    {
        $school = School::where('id', $request->id)->first();

        $status = !$school->status;

        $school->update([
            'status' => $status,
        ]);
        return back()->withSuccess('The status has been switched!');
    }
}
