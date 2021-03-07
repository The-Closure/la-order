@extends('layouts.app')

@section('title', "order")

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th><abbr title="Date">Date</abbr></th>
                <th><abbr title="Restaurant">Restaurant</abbr></th>
                <th><abbr title="total">Total</abbr></th>
                <th><abbr title="show ">Details</abbr></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->OrderItems[0]->meal->restaurant->name }}</td>
                        <td>{{ $order->total }}</td>
                        <td> <a href="{{ route(order.show,["order"=>$order]) }}">details </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection