<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $apartments = Apartment::has('messages')
            ->where('user_id', $id)
            ->get()
            ->toArray();
        $messages = Message::whereIn('apartment_id', [$apartments])->get();
        return view('admin.message', compact('messages'));
    }
}
