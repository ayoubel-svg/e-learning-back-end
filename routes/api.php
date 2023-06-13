<?php

use App\Http\Controllers\CoursController;
use App\Http\Controllers\SignUpLoginController;
use App\Http\Controllers\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post("/register", [SignUpLoginController::class, "register"]);
Route::post("/login", [SignUpLoginController::class, "login"]);
Route::post("/logout", [SignUpLoginController::class, "logout"]);




Route::group(["middleware" => ["auth:sanctum"]], function () {
    Route::resource("/cour", CoursController::class);
    Route::resource("/videos", VideoController::class);
});
