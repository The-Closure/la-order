<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    public function markAsDone($id)
    {
        $order= Order::findOrfail($id);
        $order->status='Done';
        $order->save();
        return redirect()->route('orders.index')->withMessage('Order was Done');
    }
}
