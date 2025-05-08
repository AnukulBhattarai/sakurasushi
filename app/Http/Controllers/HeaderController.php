<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $header = Header::latest()->simplePaginate(15);
        return view('admin.pages.header.index', compact('header'));
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
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'section' => 'required|string|max:255|unique:headers,section',
        ]);
        $header = Header::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'section' => $request->section,
        ]);
        return redirect()->route('header.index')->withSuccess('Header added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Header $header)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Header $header)
    {
        return view('admin.pages.header.edit', compact('header'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Header $header)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'section' => 'required|string|max:255|unique:headers,section,' . $header->id,
        ]);
        $header->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'section' => $request->section,
        ]);
        return redirect()->route('header.index')->withSuccess('Header updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Header $header)
    {
        $header->delete();
        return redirect()->route('header.index')->withSuccess('Header deleted Successfully!');
    }
}
