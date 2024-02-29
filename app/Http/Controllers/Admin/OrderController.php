<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;


class OrderController extends Controller
{
    public function pendingorder() {
        $pending_order  =Order::where('status' , 'pending')->latest()->get();

        return view('pendingorder', compact('pending_order'));
    }
}
