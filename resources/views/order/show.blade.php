@extends('layouts.app')
@section('title', "order")
@section('content')
    <div class="container">
        
        <table class="table">
            <thead>
            <tr>
                <th><abbr title="meal_id">meal</abbr></th>
                <th><abbr title="Restaurant">Restaurant</abbr></th>
                <th><abbr title="quantite">quantite</abbr></th>
                <th><abbr title="price">price</abbr></th>
                <th><abbr title="total">total</abbr></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $orderItem)
                    <tr>
                        <td>{{ $orderItem->meal }}</td>
                        <td>{{ $orderItem->meal->restaurant->name  }}</td>
                        <td>{{ $orderItem->quantite }}</td>
                        <td>{{ $orderItem->price }}</td>
                        <td>{{ $orderItem->price * $orderItem->quantite }}</td>
                    </tr>
                @endforeach
                
            </tbody>
            <tfoot>
                <tr>Total: {{ $order->total }}</tr>
            </tfoot>
        </table>
    </div>
@endsection