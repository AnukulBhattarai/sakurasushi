<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = HomeBanner::latest()->simplePaginate(15);
        return view('admin.pages.home-banner.index', compact('banner'));
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
            'sub_title' => 'required|string|max:255',
            'link' => 'nullable|url',
            'background' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        $image = $request->file('background');
        $background = time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('banners', $background, 'public');

        $banner = HomeBanner::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'link' => $request->link,
            'background' => $path,
        ]);
        return redirect()->route('banner.index')->withSuccess('The banner has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(HomeBanner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomeBanner $banner)
    {
        return view('admin.pages.home-banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HomeBanner $banner)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'nullable|url',
            'sub_title' => 'required|string|max:255',
            'background' => 'mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($request->hasFile('background')) {
            $image = $request->file('background');
            $background = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->delete($banner->background);
            $path = $image->storeAs('banners', $background, 'public');
        } else {
            $path = $banner->background;
        }

        $banner->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'link' => $request->link,
            'background' => $path,
        ]);
        return redirect()->route('banner.index')->withSuccess('The banner has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeBanner $banner)
    {
        Storage::disk('public')->delete($banner->background);
        $banner->delete();
        return redirect()->route('banner.index')->withSuccess('The banner has been deleted!');
    }
}
