<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use App\Coupon;
use App\Promotion;
use Illuminate\Support\Carbon;


class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartment_check = [];

        for ($i = 0; $i < 10; $i++) {
            $apartment = Apartment::inRandomOrder()->first();

            while (in_array($apartment->id, $apartment_check)) {
                $apartment = Apartment::inRandomOrder()->first();
            }

            $coupon = Coupon::inRandomOrder()->first();

            $date_now = Carbon::now();
            $date_stop = Carbon::now()->addHours($coupon->duration);

            $newPromotion = new Promotion;

            $newPromotion->apartment_id = $apartment->id;
            $newPromotion->coupon_id = $coupon->id;
            $newPromotion->date_start = $date_now;
            $newPromotion->date_end = $date_stop;
            $newPromotion->save();
            array_push($apartment_check, $newPromotion->apartment_id);
        }
    }
}
