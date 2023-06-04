<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class SignUpLoginController extends Controller
{
    use HttpResponses, HasApiTokens;
    public function login(LoginFormRequest $request)
    {
        $request->validated($request->all());
        $credentials = $request->only("email", "password");
        if (!Auth::attempt($credentials)) {
            return $this->error("", "there is no user with this credentials", 401);
        }
        $user = User::where("email", $request->email)->first();
        if (!$user) {
            $this->error("", "User not found", 404);
        }
        return $this->success([
            "user" => $user,
            "token" => $user->createToken("Api Token Of : " . $user->name, ["user"])->plainTextToken,
        ]);
    }
    public function register(RegisterFormRequest $request)
    {
        $request->validated($request->all());
        $user =
            User::create([
                "name" => $request->fullname,
                "email" => $request->email,
                "password" => Hash::make($request->password)
            ]);
        return $this->success([
            "user" => $user,
            "token" => $user->createToken("Api Token for: " . $user->name, ['user'])->plainTextToken,
        ]);
    }
    public function logout(Request $request)
    {
        $user = $request->user();
        if ($user) {
            $user->tokens()->delete();
        }

        return $this->success("", "Logout with success");
    }

    public function fetchAuthenticatedUser()
    {
        return Auth::user();
    }
}
