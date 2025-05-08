<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Blog::latest()->simplePaginate(15);
        return view('admin.pages.blogs.index', ['blog' => $blog]);
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
            'thumbnail' => 'required|mimes:jpeg,png,jpg|max:2048',
            'image.*' => 'mimes:jpg,png,jpeg|max:2048',
        ]);
        $image = $request->file('thumbnail');
        $thumbnail = time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('blogs', $thumbnail, 'public');

        $blog = Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => $path,
        ]);
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $imageName = $request->user()->id . '_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('blogs', $imageName, 'public');
                $blog->image()->create(['image' => $path]);
            }
        }
        return redirect()->route('blog.index')->withSuccess('The blog has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.pages.blogs.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'mimes:jpeg,png,jpg|max:2048',
            'images.*' => 'mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $thumbnail = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->delete($blog->thumbnail);
            $path = $image->storeAs('blogs', $thumbnail, 'public');
        } else {
            $path = $blog->thumbnail;
        }

        $blog->update([
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => $path,
        ]);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $imageName = $request->user()->id . '_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('blogs', $imageName, 'public');
                $blog->image()->create(['image' => $path]);
            }
        }
        return redirect()->route('blog.index')->withSuccess('The blog has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->thumbnail) {
            Storage::disk('public')->delete($blog->thumbnail);
        }
        $blog->delete();
        return back()->withSuccess('The blog has been deleted!');
    }
    public function change_status(Request $request)
    {
        $blog = Blog::where('id', $request->id)->first();

        $status = !$blog->status;

        $blog->update([
            'status' => $status,
        ]);
        return back()->withSuccess('The status has been switched!');
    }
}
