<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery = Gallery::simplePaginate(15);
        return view('admin.pages.gallery.index', ['gallery' => $gallery]);
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
            'image.*' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        $gallery = Gallery::create([
            'name' => $request->name,
        ]);
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $imageName = $request->user()->id . '_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('blogs', $imageName, 'public');
                $gallery->image()->create(['image' => $path]);
            }
        }
        return redirect()->route('gallery.index')->withSuccess('The gallery has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.pages.gallery.edit', ['gallery' => $gallery]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validator = $request->validate([
            'name' => 'required',
            'image.*' => 'mimes:jpg,png,jpeg|max:2048',
        ]);

        $flag = $gallery->update([
            'name' => $request->name,
        ]);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $imageName = $request->user()->id . '_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('blogs', $imageName, 'public');
                $gallery->image()->create(['image' => $path]);
            }
        }

        if ($flag) {
            return redirect(route('gallery.index'))->withSuccess('The gallery has been updated!');
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->delete()) {
            return redirect(route('gallery.index'))->withSuccess('The gallery has been deleted!');
        } else {
            return redirect(route('gallery.index'))->withErrors('The gallery could not be deleted!');
        }
    }

    public function change_status(Request $request)
    {
        $gallery = Gallery::where('id', $request->id)->first();
        $status = !$gallery->status;
        $gallery->update([
            'status' => $status,
        ]);
        return back()->withSuccess('The status has been switched!');
    }
}
