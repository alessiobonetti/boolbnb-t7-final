<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use App\Apartment;
use App\Message;


class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++) {

            $apartment = Apartment::inRandomOrder()->first();
            
            $newMessage = new Message;
            $newMessage->apartment_id = $apartment->id;

            $newMessage->email = $faker->freeEmail();
            $newMessage->body = $faker->paragraph(2);

            $newMessage->save();
        }
    }
}
