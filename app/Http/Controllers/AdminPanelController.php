<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Message;
use App\Models\SubscribedEmails;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\App;

class AdminPanelController extends Controller
{
    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }

    public function detach_image(Request $request)
    {
        try {
            $modelType = $request->input('model_type');
            $modelId = $request->input('model_id');
            $modelInstance = App::make($modelType)->find($modelId);

            // Find the specific image
            $img = Images::find($request->input('image'));

            if (!$img) {
                return back()->with('error', 'Image not found.');
            }

            // Delete image file from storage
            Storage::disk('public')->delete($img->image);


            // Delete only the selected image
            $img->delete();

            return back()->withSuccess('Image was deleted!');
        } catch (ModelNotFoundException $e) {
            return back()->with('error', 'Model not found.');
        }
    }

    public function messages()
    {
        $messages = Message::latest()->simplePaginate(15);
        // dd($messages);
        return view('admin.pages.messages.index', compact('messages'));
    }



    // public function getemailsubscribe()
    // {
    //     $email = SubscribedEmails::simplePaginate(15);
    //     return view('admin.pages.email_subscribe.index', compact('email'));
    // }
}
