<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use App\Photo;
use Illuminate\Support\Facades\Storage;

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
        $validator = $request->validate([
            'file' => 'required|file',
            'photo_title' => 'unique:photos'
        ]);

        $fileName = time().'.'.$request->file->getClientOriginalExtension();
        //$file = base64_encode(file_get_contents($request->file('file')));
        //$request->file->move(public_path('upload'), $fileName);

        // when success is returnd with url from the bewlo request I save it in the db as photo_url
        // $response = Http::post('https://test.rxflodev.com', [
        //     'imageData' => $request->file('file'),
        // ]);

        $photo = new Photo;
        $photo->photo_title = $request->photo_title;
        $photo->photo_url = $fileName;
        $photo->user_id = Auth::id();
        $photo->save();

        return response()->json(['success'=>'You have successfully upload file.']);
    }
}
