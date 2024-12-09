<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Pastikan untuk mengimpor facade Auth

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    { 
        $credentials = $request->validate([
            'username' => 'required|string', // Login menggunakan username
            'password' => 'required|string',
        ]);

        // Cek apakah username dan password sesuai
        if (!auth()->attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = auth()->user(); // Mendapatkan user yang berhasil login

        // Return response dengan token
        return response()->json([
            'token' => $user->createToken('apitrash')->plainTextToken,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'username' => $user->username,
                'email' => $user->email,
                'birth_date' => $user->birth_date,
                'avatar' => $user->avatar,
            ],
        ]);
    }
}
