<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    public function update(Order $order)
    {
        $order->status = 'canceled';
        $order->save();

        return redirect()->back()->with('success', 'Order Was Canceled');
    }
}
