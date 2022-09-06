<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuestionController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->middleware(['admin', 'auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/registered-user', [AdminController::class, 'registerUser'])->name('admin.register.user');
    Route::get('/registered-user/{id}', [AdminController::class, 'registerUserEdit'])->name('admin.register.user.edit');
    Route::put('/registered-user/{id}', [AdminController::class, 'registerUserUpdate'])->name('admin.register.user.update');
    Route::delete('/registered-user/{id}', [AdminController::class, 'registerUserDestroy'])->name('user.destroy');
    Route::get('/registered-user-details/{id}', [AdminController::class, 'registerUserDetails'])->name('user.details');

    Route::resources([
        'question' => QuestionController::class,
    ]);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';