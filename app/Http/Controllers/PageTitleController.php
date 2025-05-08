<?php

namespace App\Http\Controllers;

use App\Models\PageTitle;
use Illuminate\Http\Request;

class PageTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = PageTitle::latest()->simplePaginate(15);
        return view('admin.pages.pageTitle.index', compact('pageTitle'));
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
            'page' => 'required|string',
        ]);
        $pageTitle = PageTitle::create([
            'title' => $request->title,
            'page' => $request->page,
        ]);
        return redirect()->route('pageTitle.index')->withSuccess('Page Title added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PageTitle $pageTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PageTitle $pageTitle)
    {
        return view('admin.pages.pageTitle.edit', compact('pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PageTitle $pageTitle)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'page' => 'required|string',
        ]);
        $pageTitle->update([
            'title' => $request->title,
            'page' => $request->page,
        ]);
        return redirect()->route('pageTitle.index')->withSuccess('Page Title updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PageTitle $pageTitle)
    {
        $pageTitle->delete();
        return redirect()->route('pageTitle.index')->withSuccess('Page Title deleted Successfully!');
    }
}
