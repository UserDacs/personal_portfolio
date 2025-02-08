<?php

use Illuminate\Support\Facades\Route;



Auth::routes();


Route::get('/', [App\Http\Controllers\PersonalController::class, 'index'])->name('personal');

Route::get('admin/login', [App\Http\Controllers\Admin\HomeController::class, 'admin_login'])->name('admin.login');
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('dashboard');
    Route::get('/inbox', [App\Http\Controllers\Admin\HomeController::class, 'inbox'])->name('inbox');

    Route::get('/inbox/detail', [App\Http\Controllers\Admin\HomeController::class, 'inbox_details']);


    Route::get('/inbox/detail/{subject}/{email}', [App\Http\Controllers\Admin\HomeController::class, 'inbox_details_1']);

    // Route::get('/profile', [App\Http\Controllers\Admin\HomeController::class, 'profile']);

    Route::get('/profile/{id}', [App\Http\Controllers\Admin\HomeController::class, 'profile_info']);

    Route::get('/files', [App\Http\Controllers\Admin\HomeController::class, 'files'])->name('files');

    Route::get('/users', [App\Http\Controllers\Admin\HomeController::class, 'users'])->name('users');
    
    Route::get('/user-admin', [App\Http\Controllers\Admin\HomeController::class, 'user_admin']);

    Route::get('/settings', [App\Http\Controllers\Admin\HomeController::class, 'settings']);


    Route::post('/register', [App\Http\Controllers\Admin\HomeController::class, 'register'])->name('register');


    Route::get('/user-list', [App\Http\Controllers\Admin\HomeController::class, 'usersList'])->name('users.list');
    

    Route::post('/store-user', [App\Http\Controllers\Admin\ApiController::class, 'store'])->name('store.user');
    
    Route::post('/uploadMulti', [App\Http\Controllers\Admin\ApiController::class, 'uploadMulti'])->name('uploadMulti');
    
    Route::delete('/users/{filename}', [App\Http\Controllers\Admin\ApiController::class, 'deleteFile'])->name('file.delete');
    

    Route::post('/upload-profile-image', [App\Http\Controllers\Admin\ApiController::class, 'uploadProfileImage'])->name('upload.profile.image');

    Route::post('/updateStatus', [App\Http\Controllers\Admin\ApiController::class, 'updateStatus'])->name('updateStatus');
    

    
});

Route::post('/send-email', [App\Http\Controllers\Admin\ApiController::class, 'send_email']);