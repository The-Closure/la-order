<?php

namespace App\Http\Controllers\Delivary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderStatuscontroller extends Controller
{
    public function markAsDone($id)
    {
        $order=Order::findOrfail($id);
        $order->status='Done';
        $order->save();
        return redirect()->route('orders.index')->withMessage('Order was Done');
    }
}
