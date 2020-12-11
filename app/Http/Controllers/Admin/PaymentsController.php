<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\ClientToken;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{
    public function make(Request $request)
    {
        $coupons = Coupon::all();
        $id = Auth::id();
        $apartments = Apartment::all()->where('user_id', $id);
        $gateway = ClientToken::generate();

        return view('admin.payment', compact('gateway', 'apartments', 'coupons'));
    }

    public function transaction(Request $request)
    {
    }
}
