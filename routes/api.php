<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
 
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        $token = $user->createToken('ffToken')->plainTextToken;
        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    } else {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    
})->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/modules', 'App\Http\Controllers\ModulesController@getAllUserModules');
    Route::post('/modules', 'App\Http\Controllers\ModulesController@insertModule');
    Route::get('/fields', 'App\Http\Controllers\FieldsController@getAllFieldsOfModule');
    Route::get('/fieldtypes', 'App\Http\Controllers\FieldtypesController@getAllFieldtypes');
    Route::get('/values', 'App\Http\Controllers\FieldvaluesController@getAllFieldvalues');
});
