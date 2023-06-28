<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeveloperController;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('developer')->group(function (){

    Route::get('register',[DeveloperController::class,'register'])->name('developer.register');
    Route::post('dev-store',[DeveloperController::class,'devStore'])->name('developer.store-dev');
    Route::get('login',[DeveloperController::class,'login'])->name('developer.login');
    Route::post('store',[DeveloperController::class,'store'])->name('developer.store');

    Route::middleware(['auth:dev'])->group(function (){
        Route::get('timesheet',[DeveloperController::class,'timesheet'])->name('developer.timesheet');  //Timesheet entries
        Route::get('logout',[DeveloperController::class,'logout'])->name('developer.logout');  //Logout
        Route::get('profile',[DeveloperController::class,'profile'])->name('developer.profile');
        Route::put('update',[DeveloperController::class,'profileUpdate'])->name('developer.profile-update');
        Route::delete('delete',[DeveloperController::class,'profileDelete'])->name('developer.profile-delete');
    });

});



require __DIR__.'/auth.php';
