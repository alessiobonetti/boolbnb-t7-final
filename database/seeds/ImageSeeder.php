<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use App\Image;
use Faker\Generator as Faker;


class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartments = Apartment::all();

        for ($i=0; $i < 5; $i++)
        {
            foreach ($apartments as $apartment) {

                $newImage = new Image;

                $newImage->apartment_id = $apartment->id;

                $newImage->media = $faker->imageUrl(300 , 400 , 'cats');

                $newImage->save();
            }
        }
    }
}
