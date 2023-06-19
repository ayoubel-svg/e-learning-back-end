<?php

namespace App\Http\Controllers;

use App\Http\Resources\CoursResource;
use App\Models\Course;
use Illuminate\Http\Request;

class GetCoursesController extends Controller
{
    public function index()
    {
        return Course::get();
    }
}
