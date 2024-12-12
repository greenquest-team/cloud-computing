<?php

namespace App\Http\Controllers\Auth;

use App\Helper\ApiFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        $request->user()->currentAccessToken()->delete();

        return ApiFormatter::createApi(200, 'Successfully logged out', null);
    }
}
