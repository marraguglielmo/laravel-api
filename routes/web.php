<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\TechnologiesController;
use App\Http\Controllers\Admin\TypesController;

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
// Rotta Pubblica
Route::get('/', [PageController::class, 'index'])->name('home');

// Rotte Admin
// sono protette da middleware
Route::middleware(['auth', 'verified'])
    // hanno la URI preceduta da 'admin'
    ->prefix('admin')
    // il name è sempre preceduto da 'admin.'
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('home');
        Route::resource('projects', ProjectsController::class);
        Route::resource('technologies', TechnologiesController::class)->except(['create', 'show', 'edit']);
        Route::resource('types', TypesController::class)->except(['create', 'show', 'edit']);

        // rotte custom
        Route::get('project-type', [TypesController::class, 'typeProjects'])->name('type_projects');
    });

// Rotte Auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
