<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = Event::latest()->simplePaginate(15);
        return view('admin.pages.event.index', ['event' => $event,]);
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
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date' => 'required|date',
            'thumbnail' => 'required|image|max:2048',
        ]);

        $image = $request->file('thumbnail');
        $profile = time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('events', $profile, 'public');

        $event = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'phone' => $request->phone,
            'email' => $request->email,
            'date' => $request->date,
            'thumbnail' => $path,
        ]);
        return redirect()->route('event.index')->withSuccess('The event has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('admin.pages.event.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date' => 'required|date',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $profile = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('events', $profile, 'public');
            $event->update(['thumbnail' => $path]);
        }

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'phone' => $request->phone,
            'email' => $request->email,
            'date' => $request->date,
        ]);
        return redirect()->route('event.index')->withSuccess('The event has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        Storage::disk('public')->delete($event->thumbnail);
        $event->delete();
        return redirect()->route('event.index')->withSuccess('The event has been deleted');
    }

    public function change_status(Request $request)
    {
        $event = Event::where('id', $request->id)->first();

        $status = !$event->status;

        $event->update([
            'status' => $status,
        ]);
        return back()->withSuccess('The status has been switched!');
    }
}
