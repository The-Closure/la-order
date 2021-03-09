@extends('layouts.app1')
@section('content')
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th><abbr title="featured">featured</abbr></th>
            <th><abbr title="name">Name</abbr></th>
            <th><abbr title="desc">Desc</abbr></th>
            <th><abbr title="status">Status</abbr></th>
            <th><abbr title="price ">Price</abbr></th>
            <th><abbr title="option ">option</abbr></th>
        </tr>
        </thead>
        <tbody>
            @foreach ($meals as $meal)
                <tr>
                    <td><div class="image"><img src="{{ $meal->featured }}" alt="{{ $meal->name }}"></div></td>
                    <td>{{ $meal->name }}</td>
                    <td>{{ $meal->desc }}</td>
                    <td>{{ $meal->status }}</td>
                    <td>{{ $meal->price }}</td>
                    <td><button class="button is-info" onclick="addToCart({{ $meal->id }}, {{ $meal->price }})">Add to Order</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('script')
<script>
    function addToCart (id, price) {
        const meal = {
            id,
            price,
            quantity: 1
        }
        order.items.push(meal)
        localStorage.setItem('order', JSON.stringify(order))
        alert('added to cart')
    }
</script>
@endsection