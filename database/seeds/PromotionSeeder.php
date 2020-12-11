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
        // Array per controllare se l'appartamento ha già una promozione
        $apartment_check = [];

        for ($i = 0; $i < 4; $i++) {
            // Seleziono un apartment random
            $apartment = Apartment::inRandomOrder()->first();
            // Verifico che non abbia promotion
            while (in_array($apartment->id, $apartment_check)) {
                $apartment = Apartment::inRandomOrder()->first();
            }
            // Scelgo random un coupon
            $coupon = Coupon::inRandomOrder()->first();
            // Gestisco le date con Carbon (data di oggi e somma di date)
            $date_now = Carbon::now();
            $date_stop = Carbon::now()->addHours($coupon->duration);

            $newPromotion = new Promotion;

            $newPromotion->apartment_id = $apartment->id;
            $newPromotion->coupon_id = $coupon->id;
            $newPromotion->date_start = $date_now;
            $newPromotion->date_end = $date_stop;
            $newPromotion->save();
            // trovato l'appartamento lo pusho nel'array di controllo
            array_push($apartment_check, $newPromotion->apartment_id);
        }
    }
}
