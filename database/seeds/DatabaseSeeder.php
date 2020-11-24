<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Inseriti i vari seeder per un lancio unico
        $this->call([
            UsersTableSeeder::class,
            ApartmentsTableSeeder::class,
            ServiceSeeder::class,
            ApatmentServiceTableSeeder::class,
            MessageSeeder::class,
            ViewSeeder::class,
            ImageSeeder::class,
            CouponSeeder::class,
            PromotionSeeder::class
        ]);
    }
}
