<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $about = About::first();
        if (!is_null($about)) {
            return redirect(route('about.show', $about->id));
        } else {
            return view('admin.pages.about.index', ['about' => $about]);
        }
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
    public function show(About $about)
    {
        return view('admin.pages.about.view', ['value' => $about]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('admin.pages.about.edit', ['about' => $about]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
            'side_image' => 'mimes:jpeg,jpg,png,gif|max:2048',
        ]);
        // dd($request->all());



        $about->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
        ]);
        // dd(request()->all());


        if ($request->hasFile('side_image')) {
            $image = $request->file('side_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            if ($about->side_image) {
                Storage::disk('public')->delete($about->side_image);
            }
            $path = $image->storeAs('resources', $imageName, 'public');
            $about->update(['side_image' => $path]);
        }
        return redirect(route('about.index'))->withSuccess("The about details has been set.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
