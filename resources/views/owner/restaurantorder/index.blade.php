    @extends('layouts.app1')

    @section('title', 'Resturant Orders ')

    @section('content')
    <div class="container">
    <div class="columns is-multiline">
        @foreach ($orders as $order)
        <div class="column is-4">
        <a href="{{ route('orders.show', $order->$id) }}">
            <div class="card">
            <div class="card-content">
                <div class="media">
                <div class="media-content">
                    <p class="title is-4">{{ $order->total }}</p>
                    <p class="title is-4">{{ $order->note }}</p>
                    <p class="title is-4">{{ $order->rating }}</p>
                    <p class="title is-4">{{ $order->feedback }}</p>
                        <div class="field">
                            <label class="label">status</label>
                            <div class="control">
                                <div class="select">
                                    <select name="{{ $order->status}}">
                                        <option value="preparing">Preparing</option>
                                        <option value="delivering">delivering</option>
                                        <option value="rejected">Rejected</option>
                                    </select>
                                </div>
                                @error('status')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                </div>
                </div>
            </div>
            </div>
        </a>
        </div>
        @endforeach
    </div>
    </div>
    @endsection
