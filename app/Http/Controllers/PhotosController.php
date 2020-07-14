<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Photo;

class PhotosController extends Controller
{
/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     */
    public function getPhotos()
    {
        $photos = Photo::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return response()->json($photos);
    }

    /**
     *
     */
    public function uploadPhoto(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|file|image|mimes:png|size:1024|dimensions:max_width=1000,max_height=700'
        ]);

        $photo = new Photo;
        $photo->photo_title = $request->title;
        $photo->photo_url = $request->photo_url;
        $photo->user_id = Auth::id();
        $photo->save();

        return response()->json('uploading image....');
    }
}
