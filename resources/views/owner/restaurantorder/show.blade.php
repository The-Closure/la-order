            @extends('layouts.app')

            @section('title', $order->id)

            @section('content')
                <div class="container">
                    <div class="columns">
                        <div class="column is-6">
                            @foreach ($orderitems as $orderitem)
            <div class="column is-4">
                <div class="card">
                <div class="card-image">
                    <figure class="image is-4by3">
                    <img src="{{ $orderitem->meal->featured_image }}" alt="Placeholder image">
                    </figure>
                </div>
                <div class="card-content">
                    <div class="media">
                    <div class="media-content">
                        <p class="title is-4">{{  $orderitem->meal->name}}</p>
                        <p class="subtitle is-6">{{  $orderitem->price }}</p>
                        <p class="title is-4">{{  $orderitem->quantity}}</p>
                        <p class="title is-4">{{  $orderitem->price * $orderitem->quantity}}</p>

                    </div>
                    </div>

                    <div class="content">
                    {{  $orderitem->meal->desc }}
                    </div>
                </div>
                </div>
            </a>
            </div>
            @endforeach

                        </div>
                    </div>
                </div>
            @endsection









    <h3 class="title is-3">{{ $order->order_item-> }}</h3>
    <h3 class="title is-3">{{ $post->}}</h3>
    <h3 class="subtitle is-5">{{ $post->category->name }}</h3>
    <div class="content">
        {{ $post->content }}
    </div>
    <p class="content">
        posted at: {{ $post->created_at }}
    </p>
