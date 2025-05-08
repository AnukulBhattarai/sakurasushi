<?php

namespace App\Http\Controllers;

use App\Models\ContactVideo;
use Illuminate\Http\Request;

class ContactVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $video = ContactVideo::simplePaginate(15);
        return view('admin.pages.video.index', compact('video'));
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
            'title' => 'required|max:255',
            'link' => 'required|max:255',

        ]);
        $video = ContactVideo::create([
            'title' => $request->title,
            'link' => $request->link,
        ]);

        return redirect()->route('video.index')->withSuccess('Video added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactVideo $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactVideo $video)
    {
        return view('admin.pages.video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactVideo $video)
    {
        $request->validate([
            'title' => 'required|max:255',
            'link' => 'required|max:255',
        ]);
        $video->update([
            'link' => $request->link,
            'title' => $request->title,
        ]);
        return redirect()->route('video.index')->withSuccess('Video updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactVideo $video)
    {
        $video->delete();
        return redirect()->route('video.index')->withSuccess('Video deleted Successfully!');
    }
}
