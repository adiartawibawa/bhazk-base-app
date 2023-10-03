<?php

use App\Http\Controllers\SwitchRoleController;
use App\Livewire\Dashboard\Dashboard;
use App\Livewire\User\Profile;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/switch-role/{role}', SwitchRoleController::class)->name('switch.role');

    Route::get('/home', Dashboard::class)->name('home');
    Route::get('/profile', Profile::class)->name('profile');
});
