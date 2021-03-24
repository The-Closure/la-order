    @extends('layouts.app1')

    @section('title', 'Restaurant Orders ')

    @section('content')
        <div class="container">
            <div class="columns is-multiline">
                @foreach ($orders as $order)
                    <div class="column is-4">
                        <div class="card">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <a href="{{ route('restaurantorders.show', $order) }}">
                                            {{ $order->user->name }}
                                        </a>
                                        <p class="title is-4">{{ $order->total }}</p>
                                        <p class="title is-4">{{ $order->note }}</p>
                                        <p class="title is-4">{{ $order->rating }}</p>
                                        <p class="title is-4">{{ $order->feedback }}</p>
                                        <div class="field">
                                            <label class="label">status</label>
                                            <div class="control">
                                                <div class="select">
                                                    <select name="status" value="{{ $order->status }}"
                                                        disabled={{ $order->status == 'Done' || $order->status == 'delivering' }}>
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
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
