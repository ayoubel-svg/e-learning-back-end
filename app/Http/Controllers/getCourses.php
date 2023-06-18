<?php

namespace App\Http\Controllers;

use App\Http\Resources\CoursResource;
use App\Models\Course;
use Illuminate\Http\Request;

class getCourses extends Controller
{
    public function index()
    {
        return Course::all();
    }
}
