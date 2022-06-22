<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use  App\Http\Controllers\LinkChecker;


Route::get('/', function () { return redirect('login'); });

Route::middleware([
    'auth:sanctum',
        config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        $token = $user->createToken('JWT');        
        return view('dashboard', ['token'=> $token->plainTextToken]);
    })->name('dashboard');
});
 
Route::get('/verificar_links', [LinkChecker::class, 'index']);
