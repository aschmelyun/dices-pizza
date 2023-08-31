<?php

use App\Http\Controllers\PublicPizzaController;
use Illuminate\Support\Facades\Route;

Route::get('/pizzas/{Pizza}', [PublicPizzaController::class, 'show'])->name('public.pizzas.show');
