<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::latest()->simplePaginate(15);
        return view('admin.pages.categories.index', compact('categories'));
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
            'icon' => 'nullable|string|max:255',
        ]);

        Categories::create([
            'name' => $request->name,
            'icon' => $request->icon,
        ]);

        return redirect()->route('category.index')->withSuccess('Category added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categories)
    {
        return view('admin.pages.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $categories)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        $categories->update([
            'name' => $request->name,
            'icon' => $request->icon,
        ]);

        return redirect()->route('category.index')->withSuccess('Category updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $category)
    {
        $category->delete();
        return redirect()->route('category.index')->withSuccess('Category deleted Successfully!');
    }
}
