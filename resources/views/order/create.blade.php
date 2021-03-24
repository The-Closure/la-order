@extends('layouts.app1')

@section('title', 'Submit Order')

@section('content')
    <div class="container">
        <form action="{{ route('orders.store') }}" method="post" id="form">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th><abbr title="meal_id">meal id</abbr></th>
                        <th><abbr title="quantity">quantity</abbr></th>
                        <th><abbr title="price">price</abbr></th>
                        <th><abbr title="total">total</abbr></th>
                    </tr>
                </thead>
                <tbody id="items">
                </tbody>
                <tfoot>
                    {{-- <tr>Total: {{ $order->total }}</tr> --}}
                </tfoot>
            </table>
            <button>Submit</button>
        </form>
    </div>
@endsection

@section('script')
    <script>
        const items = order.items
        items.forEach((item, i) => {
            document.getElementById('items').innerHTML += `
            <tr>
                <td><input type="text" name="items[${i}][meal_id]" value="${item.id}" readonly></td>
                <td><input type="text" name="items[${i}][quantity]" value="${item.quantity}"></td>
                <td><input type="text" name="items[${i}][price]" value="${item.price}" readonly></td>
                <td>${ item.price * item.quantity }</td>
            </tr>
            `
        });

    </script>
@endsection
