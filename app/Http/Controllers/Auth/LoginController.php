<?php
namespace App\Http\Controllers\Auth;

use App\Helper\ApiFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Pastikan untuk mengimpor facade Auth
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);
    
            if (!$request->filled(['username', 'password'])) {
                return ApiFormatter::createApi(400, 'Bad Request', 'All fields are required.');
            }
    
            $credentials = $request->only('username', 'password');
    
            if (!Auth::attempt($credentials)) {
                return ApiFormatter::createApi(401, 'Username atau Password salah', null);
            }
    
            $user = Auth::user();
            $token = $user->createToken('apitrash')->plainTextToken;
            $data = [
                "token" => $token,
                "user" => $user,
            ];
    
            return ApiFormatter::createApi(200, 'Success', $data);
    
        } catch (\Exception $e) {
            Log::error($e->getMessage()); 
            return ApiFormatter::createApi(500, $e->getMessage(), $e->getMessage());
        }
    }
       
}
