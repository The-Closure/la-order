@extends('layouts.app1')
@section('title', "order")
@section('content')
    <div class="container">
        
        <table class="table">
            <thead>
            <tr>
                <th><abbr title="meal_id">meal</abbr></th>
                <th><abbr title="Restaurant">Restaurant</abbr></th>
                <th><abbr title="quantity">quantity</abbr></th>
                <th><abbr title="price">price</abbr></th>
                <th><abbr title="total">total</abbr></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $orderItem)
                    <tr>
                        <td>{{ $orderItem->meal->name }}</td>
                        <td>{{ $orderItem->meal->restaurant->name  }}</td>
                        <td>{{ $orderItem->quantity }}</td>
                        <td>{{ $orderItem->price }}</td>
                        <td>{{ $orderItem->price * $orderItem->quantity }}</td>
                    </tr>
                @endforeach
                
            </tbody>
            <tfoot>
                <tr>
                    <td>Total: {{ $order->total }}</td>
                    <td>Status: {{ $order->status }}</td>
                    <td>
                        @if ($order->status == 'pending')
                        <form action="{{ route('order.cancel', $order->id) }}" method="post">
                            @csrf
                            <button class="button is-danger is-small">Cancel Order</button>
                        </form>
                        @endif
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection