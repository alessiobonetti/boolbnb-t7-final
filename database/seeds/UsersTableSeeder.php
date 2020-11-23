<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 5; $i++) {
            $newUser = new User;

            $newUser->name = $faker->firstName();
            $newUser->lastname = $faker->lastName();
            $newUser->date_of_birth = $faker->dateTimeBetween('-70 years' , 'now');
            $newUser->email = $faker->freeEmail();
            $newUser->password = Hash::make($faker->password());

            $newUser->save();
        }
    }
}
