<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Apartment;
use App\User;


class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $user = User::inRandomOrder()->first();

            $newApartment = new Apartment;
            $newApartment->user_id = $user->id;

            $newApartment->title = $faker->sentence(3, 'true');
            $newApartment->description = $faker->paragraph(10, 'true');
            $newApartment->rooms = $faker->numberBetween(1, 6);
            $newApartment->beds = $faker->numberBetween(1, 8);
            $newApartment->baths = $faker->numberBetween(1, 4);
            $newApartment->mq = $faker->numberBetween(40, 300);
            $newApartment->address = $faker->address();
            $newApartment->lat = $faker->latitude(45.43, 46.52);
            $newApartment->lng = $faker->longitude(9.1, 9.3);
            $newApartment->published = rand(0, 1);
            $newApartment->cover = $faker->imageUrl(640, 480, 'city');

            $newApartment->save();
        }
    }
}
