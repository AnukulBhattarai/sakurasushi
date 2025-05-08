<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonial = Testimonial::latest()->simplePaginate(15);
        return view('admin.pages.testimonials.index', compact('testimonial'));
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
            'name' => 'required',
            'company' => 'required',
            'designation' => 'required',
            'message' => 'required|max:255',
            'profile' => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($request->hasFile('profile')) {
            $image = $request->file('profile');
            $profile = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('testimonials', $profile, 'public');
        } else {
            $path = null;
        }

        $testimonial = Testimonial::create([
            'name' => $request->name,
            'company' => $request->company,
            'designation' => $request->designation,
            'message' => $request->message,
            'profile' => $path,
        ]);
        return redirect()->route('testimonial.index')->withSuccess('The testimonial has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.pages.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'designation' => 'required',
            'message' => 'required|max:255',
        ]);

        if ($request->hasFile('profile')) {
            if ($testimonial->profile) {
                Storage::disk('public')->delete($testimonial->profile);
            }
            $image = $request->file('profile');
            $profile = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('testimonials', $profile, 'public');
        } else {
            $path = $testimonial->profile;
        }

        $testimonial->update([
            'name' => $request->name,
            'company' => $request->company,
            'designation' => $request->designation,
            'message' => $request->message,
            'profile' => $path,
        ]);
        return redirect()->route('testimonial.index')->withSuccess('The testimonial has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('testimonial.index')->withSuccess('The testimonial has been deleted!');
    }

    public function change_status(Request $request)
    {
        $team = Testimonial::where('id', $request->id)->first();

        $status = !$team->status;

        $team->update([
            'status' => $status,
        ]);
        return back()->withSuccess('The status has been switched!');
    }
}
