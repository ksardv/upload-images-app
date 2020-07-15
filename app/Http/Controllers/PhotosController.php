<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Photo;
use Illuminate\Support\Facades\Storage;
use App\StorageGateways\PhotoGateway;

class PhotosController extends Controller
{
    protected $storage;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PhotoGateway $storage)
    {
        $this->storage = $storage;
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
            'file' => 'required',
            'photo_title' => 'unique:photos'
        ]);

        //$fileName = time().'.'.$request->file->getClientOriginalExtension();
        $file = base64_encode(file_get_contents($request->file('file')->path()));

        // when success is returnd with url from the bewlo request I save it in the db as photo_url
        $url = $this->storage->sendData($file);
        // the problem here is that the storage returns {"status":"error","message":"Required post data was not sent."}
        if($url){
            $photo = new Photo;
            $photo->photo_title = $request->photo_title;
            $photo->photo_url = $url;
            $photo->user_id = Auth::id();
            $photo->save();
        }

        return response()->json(['success'=>'You have successfully upload file.']);
    }
}
