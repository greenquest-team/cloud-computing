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
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'tgl_lahir' => 'required',
                'points' => 'nullable',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Optional avatar upload
            ]);
    
            // Proses penyimpanan avatar (jika ada)
            $avatarPath = null;
            if ($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
            } else {
                $avatarPath = 'https://storage.googleapis.com/greenquest-bucket/avatars/plants.png'; // Default avatar
            }
    
            // Buat user baru
            $user = new User();
            $user->name = $validatedData['name'];
            $user->username = $validatedData['username'];
            $user->email = $validatedData['email'];
            $user->password = bcrypt($validatedData['password']);
            $user->tgl_lahir = $validatedData['tgl_lahir'];
            $user->points = '0';
            $user->avatar = $avatarPath;
    
            if ($user->save()) {
                // Return response JSON
                return response()->json([
                    'message' => 'Registration successful',
                    'user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'username' => $user->username,
                        'email' => $user->email,
                        'tgl_lahir' => $user->tgl_lahir,
                        'points' => $user->points,
                        'avatar' => asset('storage/' . $avatarPath), // Use asset helper for URL
                    ],
                ]);
            } else {
                return response()->json([
                    'message' => 'Registration failed',
                ], 401);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 422);
        } catch (Exception $error) {
            return response()->json([
                'message' => 'An error occurred during registration',
                'error' => $error->getMessage(),
            ], 500);
        }
    }
    
    
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'nullable|string|max:255',
                'username' => 'nullable|string|max:255|unique:users,username,' . $id,
                'email' => 'nullable|email|max:255|unique:users,email,' . $id,
                'password' => 'nullable|string|min:8',
                'tgl_lahir' => 'nullable',
                'points' => 'nullable', // Allowing points to be nullable
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            if ($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
            } else {
                $avatarPath = 'https://storage.googleapis.com/greenquest-bucket/avatars/plants.png'; // Default avatar
            }

            // Cari user yang akan di-update
            $user = User::findOrFail($id);

            // Proses penyimpanan avatar (jika ada)
            if ($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                $user->avatar = $avatarPath;
            }

            // Update data user
            if (!empty($validatedData['name'])) $user->name = $validatedData['name'];
            if (!empty($validatedData['username'])) $user->username = $validatedData['username'];
            if (!empty($validatedData['email'])) $user->email = $validatedData['email'];
            if (!empty($validatedData['password'])) $user->password = bcrypt($validatedData['password']);
            if (!empty($validatedData['tgl_lahir'])) $user->tgl_lahir = $validatedData['tgl_lahir'];
            if (!empty($validatedData['points'])) $user->points = $validatedData['points']; // Updating points

            if ($user->save()) {
                // Return response JSON
                return response()->json([
                    'message' => 'Update successful',
                    'user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'username' => $user->username,
                        'email' => $user->email,
                        'tgl_lahir' => $user->tgl_lahir,
                        'points' => $user->points,
                        'avatar' => $user->avatar ? asset('storage/' . $user->avatar) : null,
                    ],
                ]);
            } else {
                return response()->json([
                    'message' => 'Update failed',
                ], 401);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 422);
        } catch (Exception $error) {
            return response()->json([
                'message' => 'An error occurred during update',
                'error' => $error->getMessage(),
            ], 500);
        }
    }
        
}
