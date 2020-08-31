<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Ad;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        if (User::count() == 0) {
            User::create([
                'name' => 'Marko Rusic',
                'email' => 'marko.rusic@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '065897342374234',
                'address' => 'stagod',
                'role' => 'user'
            ]);

            User::create([
                'name' => 'Marko Rusic',
                'email' => 'marko.rusic.admin@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'admin'
            ]);
        }

        for ($i = 0; $i < 30; $i++) {
            Ad::create([
                'title' => $faker->realText($maxNbChars = 30),
                'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'price' => rand(1000, 1500),
                'user_id' => 1
            ]);
        }

    }
}
