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
        $homepageVideo = ContactVideo::simplePaginate(15);
        return view('admin.pages.homepageVideo.index', compact('homepageVideo'));
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
        $homepageVideo = ContactVideo::create([
            'title' => $request->title,
            'link' => $request->link,
        ]);

        return redirect()->route('homepageVideo.index')->withSuccess('Video added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactVideo $homepageVideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactVideo $homepageVideo)
    {
        return view('admin.pages.homepageVideo.edit', compact('homepageVideo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactVideo $homepageVideo)
    {
        $request->validate([
            'title' => 'required|max:255',
            'link' => 'required|max:255',
        ]);
        $homepageVideo->update([
            'link' => $request->link,
            'title' => $request->title,
        ]);
        return redirect()->route('homepageVideo.index')->withSuccess('Video updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactVideo $homepageVideo)
    {
        $homepageVideo->delete();
        return redirect()->route('homepageVideo.index')->withSuccess('Video deleted Successfully!');
    }
}
