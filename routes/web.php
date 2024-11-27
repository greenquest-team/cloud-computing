<?php

use App\Http\Controllers\WasteTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello, Laravel!';
});

// Route::get('/users', function () {
//     return response()->json([
//         ['id' => 1, 'name' => 'Alice'],
//         ['id' => 2, 'name' => 'Bob'],
//     ]);
// });

// Route::get('/waste-types', [WasteTypeController::class, 'index']);