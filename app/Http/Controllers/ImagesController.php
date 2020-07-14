<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return response()->json('getting images....');
    }

    /**
     *
     */
    public function uploadImage(Request $request)
    {
        return response()->json('uploading image....');
    }
}
