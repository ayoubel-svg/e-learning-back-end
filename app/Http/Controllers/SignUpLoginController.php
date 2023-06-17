<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Support\Str;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class SignUpLoginController extends Controller
{
<<<<<<< HEAD
  use HttpResponses, HasApiTokens;
=======
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
            return $this->error("", "User not found", 404);
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
        $user->save();
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
>>>>>>> 4d8ad6bf2cefafe93aa4e7674aa245c2b0635100

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
    $user = User::create([
      "name" => $request->name,
      "email" => $request->email,
      "password" => Hash::make($request->password),
      "city" => $request->city
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

  public function update(Request $request, $user_email)
  {
    $user = User::where('email', $user_email)->first();

    if (!$user) {
      return $this->error("", "User not found", 404);
    }

    $validatedData = $request->validate([
      'name' => 'string',
      'email' => 'email|unique:users,email,' . $user->id,
      "city" => "string",
      "image" => "nullable"
    ]);

    if ($request->has('password') && $request->input('password') !== null) {
      $validatedData['password'] = Hash::make($request->input('password'));
    }

    if ($request->hasFile("image") && $request->file('image')->isValid()) {
      $pic_name = Str::random() . '.' . $request->image->getClientOriginalExtension();
      Storage::putFileAs('images', $request->image, $pic_name);
      $validatedData['image'] = $pic_name;
    } else {
      $validatedData['image'] = $user->image;
    }

    $user->update($validatedData);

    return $this->success([
      "user" => $user,
      "token" => $user->createToken("Api Token for: " . $user->name, ['user'])->plainTextToken,
    ]);
  }
}
