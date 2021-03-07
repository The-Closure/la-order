@extends('layouts.app1')

@section('title', 'My Orders')

@section('content')
<div class="container">
  <div class="columns is-multiline is-centered">
    <div class="column is-8">
      <table class="table is-fullwidth is-striped is-hoverable">
        <thead>
          <tr>
            <th><abbr title="Tag Name">id</abbr></th>
            <th><abbr title="Posts">customer_id</abbr></th>
            <th><abbr title="Actions">total</abbr></th>
            <th><abbr title="Actions">status</abbr></th>
        </tr>
        </thead>
        <tbody>
          @foreach ($orders as $order)
          <tr>
            <td><{{ $order->id }}</td>
            <td><{{ $order->customer_id }}</td>
            <td><{{ $order->total }}</td>
            <td><{{ $order->status }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  {{ $orders->links() }}
</div>
@endsection