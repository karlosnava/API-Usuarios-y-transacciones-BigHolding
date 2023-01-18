<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// MODELOS
use App\Models\User;
use App\Models\Transaction;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = User::factory(1000)->create();

        foreach ($users as $user) {
            $cant = rand(0, 100);

            for ($i = 0; $i < $cant; $i++) {
                Transaction::create([
                    'amount' => fake()->randomFloat(3, 100, 999),
                    'transaction_detail' => fake()->sentence(),
                    'month' => fake()->date("Y"),
                    'year' => fake()->date("m"),
                    'user_id' => $user->id,
                    'transaction_status_id' => fake()->numberBetween(1, 5),
                    'transaction_type_id' => fake()->numberBetween(1, 3),
                    'segmentation_id' => fake()->numberBetween(1, 3),
                ]);
            }
        }
    }
}
