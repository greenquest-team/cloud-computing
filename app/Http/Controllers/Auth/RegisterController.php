<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /**
     * Handle the registration request.
     */
    public function __invoke(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'birth_date' => 'required|date',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Optional avatar upload
        ]);

        // Proses penyimpanan avatar (jika ada)
        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        // Buat user baru
        $user = User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'birth_date' => $validatedData['birth_date'],
            'avatar' => $avatarPath, // Simpan path avatar
        ]);

        // Buat token
        // $token = $user->createToken('apitrash')->plainTextToken;

        // Return response JSON
        return response()->json([
            'message' => 'Registration successful',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'username' => $user->username,
                'email' => $user->email,
                'birth_date' => $user->birth_date,
                'avatar' => $avatarPath ? asset('storage/' . $avatarPath) : null,
            ],
            //'token' => $token,
        ]);
    }
}
