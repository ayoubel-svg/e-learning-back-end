<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Courses extends Controller
{
  
  public function index()
  {
    return Course::all();
  }

  public function store(Request $request)
  {
    //
  }

  public function show(string $id)
  {
    //
  }

  public function update(Request $request, string $id)
  {
    //
  }

  public function destroy(string $id)
  {
    $course = Course::find($id);
    Storage::delete('images/' . $course->image);
    Course::destroy($id);
  }
}
