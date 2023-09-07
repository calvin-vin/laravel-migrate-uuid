<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UserAndTodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'username' => $faker->name(),
                'email' => $faker->email()
            ]);

            Todo::create([
                'todo' => $faker->text(),
                'user_id' => $user->id
            ]);
        }
    }
}
