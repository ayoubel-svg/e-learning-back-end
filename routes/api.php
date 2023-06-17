<?php

<<<<<<< HEAD
use App\Http\Controllers\Admin\Clients;
use App\Http\Controllers\Admin\Courses;
use App\Http\Controllers\Admin\Tutors;
=======
>>>>>>> 4d8ad6bf2cefafe93aa4e7674aa245c2b0635100
use App\Http\Controllers\CoursController;
use App\Http\Controllers\SignUpLoginController;
use App\Http\Controllers\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/register", [SignUpLoginController::class, "register"]);
Route::post("/login", [SignUpLoginController::class, "login"]);
Route::post("/logout", [SignUpLoginController::class, "logout"]);
<<<<<<< HEAD
Route::patch('/update/{user_email}', [SignUpLoginController::class, "update"]);

Route::resource('/tutors', Tutors::class);
Route::resource('/clients', Clients::class);
Route::resource("/courses", Courses::class);
=======



>>>>>>> 4d8ad6bf2cefafe93aa4e7674aa245c2b0635100

Route::group(["middleware" => ["auth:sanctum"]], function () {
    Route::resource("/cour", CoursController::class);
    Route::resource("/videos", VideoController::class);
});
