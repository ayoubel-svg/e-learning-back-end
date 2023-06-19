<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoFormRequest;
use App\Http\Resources\VideoResource;
use App\Models\Course;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json($request);
        // $theId = Course::where("user_id", Auth::user()->id)->first();
        $coursId = $theId->id;
        foreach ($request->file('videos') as $myVideo) {
            $video = new Video();
            $video->cours_id = $coursId;
            $video_name = Str::random() . '.' . $myVideo->getClientOriginalExtension();
            Storage::putFileAs('videos', $myVideo, $video_name);
            $video->name = $video_name;
            $video->save();
        }
        return response()->json('Videos saved successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $videos = Video::where("cours_id", $id)->get();
        return response()->json($videos);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(VideoFormRequest $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        //
    }
}
