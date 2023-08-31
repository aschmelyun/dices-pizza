<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Inertia\Inertia;
use Inertia\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PublicPizzaController extends Controller
{
    public function show(Pizza $pizza): Response
    {
        return Inertia::render('Pizzas/Show', [
            'pizza' => $pizza
        ]);
    }
}
