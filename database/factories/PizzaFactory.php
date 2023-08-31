<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pizza>
 */
class PizzaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $toppingChoices = [
            'Extra Cheese',
            'Black Olives',
            'Pepperoni',
            'Sausage',
            'Anchovies',
            'Jalapenos',
            'Onion',
            'Chicken',
            'Ground Beef',
            'Green Peppers',
        ];

        $toppings = [];

        for($i = 1; $i <= rand(1, 4); $i++) {
            $toppings[] = $toppingChoices[rand(0, 9)];
        }

        $toppings = array_unique($toppings);

        return [
            'id' => rand(1111111, 9999999),
            'user_id' => rand(1, 10),
            'size' => ['Small', 'Medium', 'Large', 'Extra-Large'][rand(0, 3)],
            'crust' => ['Regular', 'Thin', 'Garlic'][rand(0, 2)],
            'status' => ['Ordered', 'Prepping', 'Baking', 'Checking', 'Ready'][rand(0, 4)],
            'toppings' => $toppings,
        ];
    }
}
