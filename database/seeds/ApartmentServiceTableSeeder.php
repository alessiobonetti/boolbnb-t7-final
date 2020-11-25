<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use App\Service;

class ApatmentServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments = Apartment::all();

        foreach ($apartments as $apartment) {

            $services = Service::inRandomOrder()->take(rand(1, 6))->get();

            $apartment->services()->sync($services);
        }
    }
}
