<?php

namespace App\Http\Controllers\Delivey;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class Orderstatuscontroller extends Controller
{
    
    public function markAsDone($id)
    {
        $order = Order::findOrFail($id);
        $order->status='Done';
        $order->save();
        
        return redirect('/order-history/{order}')->withMessage('Order was Done');
        
    }
}
