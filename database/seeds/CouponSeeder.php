<?php

use Illuminate\Database\Seeder;
use App\Coupon;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coupons = [
            [
                'tipo_1',
                '2.99',
                24
            ],
            [
                'tipo_2',
                '5.99',
                72
            ],
            [
                'tipo_3',
                '9.99',
                144
            ]
        ];

        foreach ($coupons as $coupon) {

            $newCoupon = new Coupon;

            $newCoupon->name = $coupon[0];
            $newCoupon->price = $coupon[1];
            $newCoupon->duration = $coupon[2];

            $newCoupon->save();
        }
    }
}
