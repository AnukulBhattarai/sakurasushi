<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publication = Publication::latest()->simplePaginate(10);
        return view('admin.pages.publication.index', compact('publication'));
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
            'title' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'required|mimes:pdf'
        ]);
        $file = $request->file('file');
        $file_name = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('reports', $file_name, 'public');


        $thumbnail = $request->file('thumbnail');
        $thumbnail_name = time() . '.' . $thumbnail->getClientOriginalExtension();
        $thumbnail_path = $thumbnail->storeAs('reports', $thumbnail_name, 'public');

        Publication::create([
            'title' => $request->title,
            'file' => $path,
            'thumbnail' => $thumbnail_path
        ]);
        return redirect()->route('publication.index')->withSuccess('Publication created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        return view('admin.pages.publication.edit', compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publication $publication)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'mimes:pdf'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('reports', $file_name, 'public');
            $publication->update([
                'file' => $path
            ]);
        }

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnail_name = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail_path = $thumbnail->storeAs('reports', $thumbnail_name, 'public');
            $publication->update([
                'thumbnail' => $thumbnail_path
            ]);
        }

        $publication->update([
            'title' => $request->title,
        ]);
        return redirect()->route('publication.index')->withSuccess('Publication updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();
        return redirect()->route('publication.index')->withSuccess('Publication deleted successfully');
    }
    public function change_status(Request $request)
    {
        $team = Publication::where('id', $request->id)->first();

        $status = !$team->status;

        $team->update([
            'status' => $status,
        ]);
        return back()->withSuccess('The status has been switched!');
    }
}
