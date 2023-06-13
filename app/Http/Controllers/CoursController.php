<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoursFormRequest;
use App\Http\Resources\CoursResource;
use App\Models\Course;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CoursResource::collection(Course::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CoursFormRequest $request)
    {
        if (!auth()->check()) {
            return $this->error("", "user is not loged in", 401);
        }
        $request->validated($request->all());
        $cours = new Course();
        $cours->title = $request->title;
        $cours->description = $request->description;
        $cours->Duration = $request->duration;
        $cours->language = $request->language;
        $cours->price = $request->price;
        $cours->category = $request->category;
        $cours->user_id = Auth::user()->id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $cours->image = $path;
        }
        $cours->save();
        return new CoursResource($cours);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CoursFormRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $Course)
    {
        //
    }
}
