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
            $credentials = $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            if (!Auth::attempt($credentials)) {
                // return response()->json(['message' => 'Unauthorized'], 401);
		 return ApiFormatter::createApi(401,'Unauthorized',null);
            }

            $user = Auth::user();
            $token = $user->createToken('apitrash')->plainTextToken;
            $data = [
                "token" => $token,
                "user" => $user,
                ];
            return ApiFormatter::createApi(200,'success',$data);

        } catch (\Exception $e) {
            Log::error($e); // Log error untuk diagnosis lebih lanjut
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }    
}
