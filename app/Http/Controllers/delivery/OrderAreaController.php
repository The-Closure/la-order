<?php

namespace App\Http\Controllers\delivery;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class OrderAreaController extends Controller
{
    public function test()
    {
        $orders = Order::whereHas('user', function (Builder $query) {
            $query->whereHas('address', function (Builder $q) {
                $area_ids = Auth::user()->delivery->areas->pluck('id');
                $q->whereIn('area_id', $area_ids);
            });
        });
    }
}
