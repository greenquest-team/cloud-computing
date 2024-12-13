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
                'avatar' => 'nullable', // Optional avatar upload
                // 'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Optional avatar upload
            ]);
    
            // Daftar URL avatar default
            $defaultAvatars = [
                'https://storage.googleapis.com/greenquest-bucket/avatars/plants.png',
                'https://storage.googleapis.com/greenquest-bucket/avatars/smile-earth.png',
                'https://storage.googleapis.com/greenquest-bucket/avatars/trash-can.png',
                'https://storage.googleapis.com/greenquest-bucket/avatars/sapi.png',                
                'https://storage.googleapis.com/greenquest-bucket/avatars/duckiey.png',
                'https://storage.googleapis.com/greenquest-bucket/avatars/bunny.png',
                'https://storage.googleapis.com/greenquest-bucket/avatars/garbage-bin.png',
            ];
    
            // Proses penyimpanan avatar (jika ada) atau pilih avatar default secara acak
            if ($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
            } else {
                $avatarPath = $defaultAvatars[array_rand($defaultAvatars)]; // Pilih avatar default secara acak
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
                return ApiFormatter::createApi(201, 'Registration successful', [
                    'id' => $user->id,
                    'name' => $user->name,
                    'username' => $user->username,
                    'email' => $user->email,
                    'tgl_lahir' => $user->tgl_lahir,
                    'password' => $user->password,
                    'points' => $user->points,
                    'avatar' => $avatarPath, // Avatar URL
                ]);
            } else {
                return ApiFormatter::createApi(401, 'Registration failed');
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return ApiFormatter::createApi(422, 'Validation error', $e->errors());
        } catch (Exception $error) {
            return ApiFormatter::createApi(500, 'An error occurred during registration', $error->getMessage());
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
            'avatar' => 'nullable|string', // Allow text input for avatar
        ]);

        // Default avatar if not provided
        $avatarPath = 'https://storage.googleapis.com/greenquest-bucket/avatars/plants.png';
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        } elseif ($request->input('avatar')) {
            $avatarPath = $request->input('avatar');
        }

        // Find user to update
        $user = User::findOrFail($id);

        // Update avatar if file provided
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        } elseif ($request->input('avatar')) {
            $user->avatar = $request->input('avatar');
        }

        // Update user data
        if (!empty($validatedData['name'])) $user->name = $validatedData['name'];
        if (!empty($validatedData['username'])) $user->username = $validatedData['username'];
        if (!empty($validatedData['email'])) $user->email = $validatedData['email'];
        if (!empty($validatedData['password'])) $user->password = bcrypt($validatedData['password']);
        if (!empty($validatedData['tgl_lahir'])) $user->tgl_lahir = $validatedData['tgl_lahir'];
        if (!empty($validatedData['points'])) $user->points = $validatedData['points']; // Updating points

        if ($user->save()) {
            return ApiFormatter::createApi(200, 'Update successful', [
                'id' => $user->id,
                'name' => $user->name,
                'username' => $user->username,
                'email' => $user->email,
                'tgl_lahir' => $user->tgl_lahir,
                'password' => $user->password,
                'points' => $user->points,
                'avatar' => $user->avatar ? $user->avatar : null,
            ]);
        } else {
            return ApiFormatter::createApi(401, 'Update failed', null);
        }
    } catch (\Illuminate\Validation\ValidationException $e) {
        return ApiFormatter::createApi(422, 'Validation error', $e->errors());
    } catch (Exception $error) {
        return ApiFormatter::createApi(500, 'An error occurred during update', $error->getMessage());
    }
}

        
}
