<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $program = Program::latest()->with('category')->simplePaginate(15);
        $categories = Categories::get();
        return view('admin.pages.program.index', ['program' => $program, 'categories' => $categories]);
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
            'title' => 'required',
            'description' => 'required',
            'duration' => 'nullable|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'instructor' => 'nullable|string|max:128',
            'price' => 'nullable|string',
            'discount' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'curriculum' => 'nullable|string',
            'skill' => 'nullable|string',
            'class_day' => 'nullable|string',
            'language' => 'nullable|string',
        ]);
        // dd($request->all());
        $image = $request->file('thumbnail');
        $profile = time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('programs', $profile, 'public');

        $extra = [
            'curriculum' => $request->curriculum ?? null,
            'skill' => $request->skill ?? null,
            'class_day' => $request->class_day ?? null,
            'language' => $request->language ?? null,
        ];

        $program = Program::create([
            'title' => $request->title,
            'description' => $request->description,
            'duration' => $request->duration,
            'instructor' => $request->instructor,
            'price' => $request->price,
            'discount' => $request->discount ?? 0,
            'thumbnail' => $path,
            'category_id' => $request->category_id,
            'extra' => $extra,
            'status' => false,
        ]);
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $imageName = $request->user()->id . '_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('programs', $imageName, 'public');
                $program->image()->create(['image' => $path]);
            }
        }
        return redirect()->route('program.index')->withSuccess('The program has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        $categories = Categories::get();
        return view('admin.pages.program.edit', compact('program', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'duration' => 'nullable|string',
            'instructor' => 'nullable|string|max:128',
            'price' => 'nullable|string',
            'discount' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'curriculum' => 'nullable|string',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
            'skill' => 'nullable|string',
            'class_day' => 'nullable|string',
            'language' => 'nullable|string',
        ]);
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $profile = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('programs', $profile, 'public');
            $program->update(['thumbnail' => $path]);
        }

        $extra = [
            'curriculum' => $request->curriculum ?? null,
            'skill' => $request->skill ?? null,
            'class_day' => $request->class_day ?? null,
            'language' => $request->language ?? null,
        ];
        // dd($extra);
        $program->update([
            'title' => $request->title,
            'description' => $request->description,
            'duration' => $request->duration,
            'instructor' => $request->instructor,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'discount' => $request->discount ?? 0,
            'extra' => $extra,
        ]);
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $imageName = $request->user()->id . '_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('programs', $imageName, 'public');
                $program->image()->create(['image' => $path]);
            }
        }
        return redirect()->route('program.index')->withSuccess('The program has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        Storage::disk('public')->delete($program->thumbnail);
        $program->delete();
        return redirect()->route('program.index')->withSuccess('The program has been deleted');
    }

    public function change_status(Request $request)
    {
        $event = Program::where('id', $request->id)->first();

        $status = !$event->status;

        $event->update([
            'status' => $status,
        ]);
        return back()->withSuccess('The status has been switched!');
    }
}
