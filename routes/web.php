<?php

use App\Http\Controllers\ActController;
use App\Http\Controllers\ActeurController;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AutorisationController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SanctionController;
use App\Http\Controllers\SpectacleController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\Auth\PasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('projet.index');
});
Route::post('/email/verification-notification', function () {
    request()->user()->sendEmailVerificationNotification();

})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::put('/user/password', [PasswordController::class, 'update'])
    ->middleware('auth')
    ->name('password.update');
// Login & Logout
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register (ghir les admins)
Route::get('/register', [AuthController::class, 'showRegister'])->middleware('auth')->name('register');
Route::post('/register', [AuthController::class, 'register'])->middleware('auth');

// Protected routes
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
// stats 

Route::get('/evenements/stats', [EvenementController::class, 'statsEvenements'])
    ->name('evenements.stats');

    // resources 
    Route::resource('acteurs', ActeurController::class);
    Route::resource('activites', ActiviteController::class);
    Route::resource('groupes', GroupeController::class);
    Route::resource('spectacles', SpectacleController::class);
    Route::resource('evenements', EvenementController::class);
    Route::resource('autorisations', AutorisationController::class)->except(['show']);
    Route::resource('sanctions', SanctionController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);

    
    Route::get('/export-acteurs', [ActeurController::class, 'export']);
    Route::get('/export-activites', [ActiviteController::class, 'export']);
    Route::get('/export-groupes', [GroupeController::class, 'export']);
    Route::get('/export-spectacles', [SpectacleController::class, 'export']);
    Route::get('/export-autorisations', [AutorisationController::class, 'export']);
    Route::get('/export-evenements', [EvenementController::class, 'export']);
    Route::get('/export-sanctions', [SanctionController::class, 'export']);



    // ✅ users (مرة وحدة فقط)
    Route::resource('users', UserRoleController::class)
        ->middleware('role:admin');

    // dashboards
    // Route::get('/dashboard', function () {
    //     return view('dashboard.home');;
    // });
    // Route::get('/admin/dashboard', function () {
    //     return view('dashboard.home');
    // })->middleware('role:admin');

    // Route::get('/gestionnaire/dashboard', function () {
    //     return view('dashboard.home');
    // })->middleware('role:gestionnaire');

    // Route::get('/agent/dashboard', function () {
    //     return view('dashboard.home');
    // })->middleware('role:agent');
Route::get('/dashboard', [CardsController::class, 'index'])->name('dashboard.index');

    // admin
    Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [CardsController::class, 'index']);
});
// gestionnaire 
    Route::middleware(['auth', 'role:gestionnaire'])->group(function () {
    Route::get('/gestionnaire/dashboard', [CardsController::class, 'index']);
});
// agent 
    Route::middleware(['auth', 'role:superviseur'])->group(function () {
    Route::get('/superviseur/dashboard', [CardsController::class, 'index']);
});

// Route::get('/dashboard/home', [CardsController::class, 'index']);

});