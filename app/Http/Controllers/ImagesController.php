<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Photo;

class ImagesController extends Controller
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
    public function getImages()
    {
        $user = Auth::user();

        return response()->json('getting images....');
    }

    /**
     *
     */
    public function uploadImage(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'photo' => 'required|file|image|mimes:png|size:1024|dimensions:max_width=1000,max_height=700'
        ]);

        return response()->json('uploading image....');
    }
}
