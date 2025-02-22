<?php

use App\Http\Middleware\AuthSession;
use App\Models\AuthController;
use App\Models\MainController;
use App\Models\User;
use App\Models\UserController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'register']);

Route::group(['middleware' => AuthSession::class], function(){
    Route::get('/', [MainController::class, 'index']);
    Route::get('/statusChamado', [MainController::class, 'chamadoView']);
    Route::get('/protocolo', [UserController::class, 'called'])->name('called');
    
});

Route::get('/dashboard', [MainController::class, 'dashboardAdmin']);

Route::get('/forget', function(){
 
    session()->forget('name', 'email', 'id');
    return redirect()->route('login');

});


Route::post('/rules', [AuthController::class, 'rules'])->name('rules');
Route::post('/authLogin', [AuthController::class, 'authLogin'])->name('authLogin');
Route::post('/openTicket', [UserController::class, 'openTicket'])->name('openTicket');