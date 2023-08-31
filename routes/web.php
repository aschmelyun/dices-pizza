<?php

use App\Http\Controllers\PizzaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicPizzaController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/order/{pizza}', [PublicPizzaController::class, 'show'])->name('public.pizzas.show');
Route::get('/order/{pizza}/stream', [PublicPizzaController::class, 'stream'])->name('public.pizzas.stream');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/pizzas', [PizzaController::class, 'index'])->name('pizzas.index');
    Route::get('/pizzas/{pizza}', [PizzaController::class, 'edit'])->name('pizzas.edit');
    Route::patch('/pizzas/{pizza}', [PizzaController::class, 'update'])->name('pizzas.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
