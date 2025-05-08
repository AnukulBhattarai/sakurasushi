<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service = Service::latest()->simplePaginate(15);
        return view('admin.pages.service.index', ['service' => $service,]);
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
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image.*' => 'mimes:jpg,png,jpeg|max:2048',
            'icon' => 'required|string|max:255',
        ]);

        $image = $request->file('thumbnail');
        $profile = time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('services', $profile, 'public');

        $service = Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => $path,
            'extra' => $request->icon,
        ]);
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $imageName = $request->user()->id . '_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('services', $imageName, 'public');
                $service->image()->create(['image' => $path]);
            }
        }
        return redirect()->route('service.index')->withSuccess('The service has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.pages.service.edit', ['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image.*' => 'mimes:jpg,png,jpeg|max:2048',
            'icon' => 'required|string|max:255',
        ]);

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $profile = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('services', $profile, 'public');
            $service->update(['thumbnail' => $path]);
        }

        $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'extra' => $request->icon,
        ]);
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $imageName = $request->user()->id . '_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('services', $imageName, 'public');
                $service->image()->create(['image' => $path]);
            }
        }
        return redirect()->route('service.index')->withSuccess('The service has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        Storage::disk('public')->delete($service->thumbnail);
        if ($service->image) {
            foreach ($service->image as $file) {
                Storage::disk('public')->delete($file->image);
            }
        }
        $service->image()->delete();
        $service->delete();
        return redirect()->route('service.index')->withSuccess('The service has been deleted');
    }

    public function change_status(Request $request)
    {
        $service = Service::where('id', $request->id)->first();

        $status = !$service->status;

        $service->update([
            'status' => $status,
        ]);
        return back()->withSuccess('The status has been switched!');
    }
}
