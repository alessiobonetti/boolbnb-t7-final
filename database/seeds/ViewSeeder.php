<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use App\Apartment;
use App\View;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {

            $apartment = Apartment::inRandomOrder()->first();

            $newView = new View;
            $newView->apartment_id = $apartment->id;
            $newView->data_view = $faker->dateTimeBetween('-1 years', 'now');
            $newView->save();
        }
    }
}
