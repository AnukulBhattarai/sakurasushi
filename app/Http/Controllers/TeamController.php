<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $team = Team::latest()->simplePaginate(15);
        return view('admin.pages.team.index', compact('team'));
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
            'position' => 'required|string|max:255',
            'profile' => 'required|mimes:png,jpg,jpeg|max:2048',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
        ]);
        $image = $request->file('profile');
        $profile = time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('teams', $profile, 'public');

        $team = Team::create([
            'name' => $request->name,
            'position' => $request->position,
            'profile' => $path,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
        ]);
        return redirect()->route('team.index')->withSuccess('The team member has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('admin.pages.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'profile' => 'mimes:png,jpg,jpeg|max:2048',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
        ]);
        if ($request->hasFile('profile')) {
            $image = $request->file('profile');
            $profile = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->delete($team->profile);
            $path = $image->storeAs('teams', $profile, 'public');
            $team->update([
                'name' => $request->name,
                'position' => $request->position,
                'profile' => $path,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'instagram' => $request->instagram,
            ]);
        } else {
            $team->update([
                'name' => $request->name,
                'position' => $request->position,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'instagram' => $request->instagram,
            ]);
        }
        return redirect()->route('team.index')->withSuccess('The team member has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        Storage::disk('public')->delete($team->profile);
        $team->delete();
        return back()->withSuccess('The team member has been deleted!');
    }

    public function change_status(Request $request)
    {
        $team = Team::where('id', $request->id)->first();

        $status = !$team->status;

        $team->update([
            'status' => $status,
        ]);
        return back()->withSuccess('The status has been switched!');
    }
}
