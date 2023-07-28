<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TimesheetEntryController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\AdminController;
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

#OAuth implementation using socialite
Route::get('/auth/{provider}/redirect',[ProviderController::class,'redirectToProvider'])->name('provider.github-to-redirect');
Route::get('auth/{provider}/callback',[ProviderController::class,'handleToProvider'])->name('provider.github-to-handle');


Route::prefix('developer')->group(function (){

    Route::get('register',[DeveloperController::class,'register'])->name('developer.register');
    Route::post('dev-store',[DeveloperController::class,'devStore'])->name('developer.store-dev');
    Route::get('login',[DeveloperController::class,'login'])->name('developer.login');
    Route::post('store',[DeveloperController::class,'store'])->name('developer.store');

    Route::middleware(['auth:dev'])->group(function (){
        Route::get('timesheet',[DeveloperController::class,'timesheet'])->name('developer.timesheet');  //Timesheet entries
        Route::post('store-entry',[TimesheetEntryController::class,'storeEntry'])->name('entry-store');
        Route::get('logout',[DeveloperController::class,'logout'])->name('developer.logout');  //Logout
        Route::get('profile',[DeveloperController::class,'profile'])->name('developer.profile');
        Route::put('update',[DeveloperController::class,'profileUpdate'])->name('developer.profile-update');
        Route::delete('delete',[DeveloperController::class,'profileDelete'])->name('developer.profile-delete');
        Route::post('project',[DeveloperController::class,'chooseProject'])->name('developer.choose-project');
        Route::post('module',[DeveloperController::class,'chooseModule'])->name('developer.choose-module');
        Route::post('create/project',[ProjectController::class,'create'])->name('project.create');
        Route::post('create/module',[ModuleController::class,'createModule'])->name('create.module');
        Route::post('create/task',[TaskController::class,'createTask'])->name('create.task');
        Route::put('update/enty/{id}',[TimesheetEntryController::class,'updateEntry'])->name('update-entry');
        Route::post('update/entry/{id}',[TimesheetEntryController::class,'update'])->name('timesheet-entry.update');
        Route::delete('entry/delete/{id}',[TimesheetEntryController::class,'deleteEntry'])->name('delete-entry');
    });


});

Route::prefix('admin')->group(function (){

    Route::get('login',[AdminController::class,'login'])->name('admin.login');
    Route::post('store',[AdminController::class,'store'])->name('admin.store');

    Route::middleware(['admin'])->group(function (){
       Route::get('dashboard',[AdminController::class,'home'])->name('admin.home');
       Route::post('logout',[AdminController::class,'logout'])->name('admin.logout');
       Route::get('developers',[AdminController::class,'developers'])->name('admin.developers');
       Route::post('manage/{id}',[AdminController::class,'manageDev'])->name('admin.manage-dev');
       Route::put('update/dev/{id}',[AdminController::class,'updateDev'])->name('admin.update-dev');
       Route::delete('delete/dev/{id}',[AdminController::class,'deleteDev'])->name('admin.delete-dev');
       Route::get('options',[AdminController::class,'options'])->name('admin.options');
       Route::post('create/project',[AdminController::class,'createProject'])->name('admin.create-project');
       Route::post('create/module',[AdminController::class,'createModule'])->name('admin.create-module');
       Route::post('choose/project',[AdminController::class,'chooseProject'])->name('admin.choose-project');
       Route::post('choose/module',[AdminController::class,'chooseModule'])->name('admin.choose-module');
    });
});


require __DIR__.'/auth.php';
