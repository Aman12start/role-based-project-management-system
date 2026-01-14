<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AdminUserController;


Route::get('/', function () {
    return redirect()->route('login');
});

// ---------- AUTH ---------- 


//------------login----------------

Route::get('/login', [AuthController::class,'loginForm'])
    ->name('login');
Route::post('/login', [AuthController::class,'login'])
    ->name('login.submit');
Route::post('/logout', [AuthController::class,'logout'])
    ->name('logout');



// ---------- ADMIN ---------- 
Route::middleware(['role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    Route::get('/dashboard', [AdminController::class,'dashboard'])
        ->name('dashboard');

    // ✅ Tasks (admin can view, assign, edit status)
    Route::resource('tasks', TaskController::class)
        ->only(['index', 'store', 'edit', 'update']);

    // ✅ Users (admin)
    Route::resource('users', AdminUserController::class);
});

//-------- USER -----------
Route::middleware(['role:user'])->prefix('user')->name('user.')->group(function () {

    Route::get('/dashboard', [TaskController::class,'userTasks'])
        ->name('dashboard');

    Route::post('/tasks/{task}/complete', [TaskController::class,'updateStatus'])
        ->name('tasks.complete');
});
