<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::simplePaginate(15);
        return view('admin.pages.setting.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'key' => 'required|string|max:100',
            'display_name' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'section_title' => 'array',
            'section_title.*' => 'string',
            'section_desc' => 'array',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'section_desc.*' => 'string',
        ]);

        $section_title = $request->section_title ?? [];
        $section_desc = $request->section_desc ?? [];

        $sections = [];

        foreach ($section_title as $key => $title) {
            $sections[] = [
                'title' => $title,
                'description' => $section_desc[$key] ?? null,
            ];
        }
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $thumbnail = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('setting', $thumbnail, 'public');
            $extra = ['thumbnail' => $path];
        } else {
            $extra = [];
        }
        // dd($extra);


        $setting = Setting::create([
            'title' => $request->title,
            'key' => $request->key,
            'display_name' => $request->display_name,
            'description' => $request->description,
            'sections' => $sections,
            'extra' => $extra,
        ]);
        return redirect()->route('setting.index')->with('success', 'Setting created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        return view('admin.pages.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'key' => 'required|string|max:100',
            'display_name' => 'nullable|string|max:100',
            'description' => 'nullable|max:255',
            'section_title' => 'array',
            'section_title.*' => 'string',
            'section_desc' => 'array',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'section_desc.*' => 'string',
        ]);

        $section_title = $request->section_title ?? [];
        $section_desc = $request->section_desc ?? [];

        $sections = [];

        foreach ($section_title as $key => $title) {
            $sections[] = [
                'title' => $title,
                'description' => $section_desc[$key] ?? null,
            ];
        }
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $thumbnail = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('setting', $thumbnail, 'public');
            $extra = ['thumbnail' => $path];
            $setting->update(['extra' => $extra]);
        }

        $setting->update([
            'title' => $request->title,
            'key' => $request->key,
            'display_name' => $request->display_name,
            'description' => $request->description,
            'sections' => $sections,
        ]);
        return redirect()->route('setting.index')->with('success', 'Setting updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect()->route('setting.index')->with('success', 'Setting deleted successfully');
    }
}
