<?php

namespace App\Http\Controllers;

use App\Models\ContactVideo;
use App\Models\Message;
use App\Models\Newsletter;
use App\Models\Program;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        // $programs = Program::where('status', true)->select('id', 'title')->get();
        // $video = ContactVideo::where('type', 2)->first();
        return view('pages.contact');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required|string',
        ]);

        $message = Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->phone,
            'message' => $request->message,
        ]);
        return redirect()->back()->withSuccess('Message sent successfully');
    }

    public function newsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $message = Newsletter::create([
            'email' => $request->email,
        ]);
        return redirect()->back()->withSuccess('Subscribed successfully');
    }
}
