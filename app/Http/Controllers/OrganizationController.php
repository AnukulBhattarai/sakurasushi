<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = Organization::first();
        if (!is_null($organizations)) {
            return redirect(route('organization.show', $organizations->id));
        } else {
            return view('admin.pages.organization.index', ['organizations' => $organizations]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $organization = Organization::first();

        if (!isset($organization)) {
            return view('admin.pages.organization.create');
        } else {
            return redirect(route('organization.index'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $org = Organization::first();
        if (!is_null($org)) {
            return redirect(route('organization.show', $org->id));
        }
        $validator = $request->validate([
            'name' => 'required|string',
            'phone' => 'required',
            'address' => 'required|string',
            'mobile' => 'required|string',
            'email' => 'required|email',
            'logo' => 'required|mimes:jpg,png,jpeg|max:2048',
        ]);

        $organization = Organization::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'other' => $request->other,
        ]);
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = "organization_logo" . '.' . $request->file('logo')->getClientOriginalExtension();
            $path = $image->storeAs('blogs', $imageName, 'public');
            $organization->update(['logo' => $path]);
        }

        if ($organization) {
            return redirect(route('organization.index'))->withSuccess("The organization details has beed set.");
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization)
    {

        // dd($organization->image
        return view('admin.pages.organization.view', ['value' => $organization]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {

        return view('admin.pages.organization.edit', ['organization' => $organization]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization $organization)
    {
        $validator = $request->validate([
            'name' => 'required|string',
            'phone' => 'required',
            'address' => 'required|string',
            'mobile' => 'required|string',
            'email' => 'required|email',
            'location' => 'required|string',
            'slogan' => 'nullable|string',
            'logo' => 'mimes:jpg,png,jpeg|max:2048',
        ]);

        $other = [];
        $slogan = $request->slogan;

        if ($request->slogan) {
            $other = [
                'slogan' => $slogan
            ];
        };

        $flag = $organization->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'location' => $request->location,
            'other' => $other,
        ]);


        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = "organization_logo" . '.' . $request->file('logo')->getClientOriginalExtension();
            if ($organization->logo) {
                Storage::disk('public')->delete($organization->logo);
            }
            $path = $image->storeAs('logo', $imageName, 'public');
            $organization->update(['logo' => $path]);
        }

        if ($flag) {
            return redirect(route('organization.index'))->withSuccess("The organization details has beed set.");
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        //
    }
}
