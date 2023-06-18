<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Tutors extends Controller
{

  public function index()
  {
    $users = User::where('role', 2)->orderBy("created_at", 'desc')->get();
    $usersWithCourses = [];
    foreach ($users as $user) {
      $userCourses = $user->courses()->get();
      $usersWithCourses[$user->id] = [
        'user' => $user,
        'courses' => $userCourses,
      ];
    }
    return $usersWithCourses;
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
    $user = User::find($id);
    $user->courses()->delete();
    $user->delete();
    Storage::delete('images/' . $user->courses()->image);
    return response()->json(['message' => 'User and associated courses deleted successfully']);
  }

}
