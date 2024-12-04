<?php

namespace App\Http\Controllers\Auth;

use App\Helper\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('apitrash')->plainTextToken;
        
        $data = [
            "token" => $token,
            "user" => $user,
            ];
        return ApiFormatter::createApi(200,'success',$data);
    }
}
