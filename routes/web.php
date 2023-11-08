<?php

use Illuminate\Support\Facades\Route;
use App\Notifications\WelcomeNotification;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotifactionController;
use App\Http\Controllers\SpatieController;

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
Route::get('/dashboard', [NotifactionController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/admin', SpatieController::class);
    Route::get('/get-roles', [SpatieController::class,'getRoles']);
    Route::get('/ajax-data', [SpatieController::class,'ajax']);
    Route::post('/role-data', [SpatieController::class,'createRole']);
    Route::post('/assign-role', [SpatieController::class,'assignRole']);
    Route::get('/permissions', [SpatieController::class,'createPermission']);
});



Route::get('/notification', [NotifactionController::class, 'notify']);
Route::get('/mark-read/{id}', [NotifactionController::class, 'markRead'])->name('markRead');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
