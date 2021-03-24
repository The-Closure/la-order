@extends('layouts.app1')

@section('title', 'Restaurants')

@section('content')
    <div class="container">
        <div class="columns is-multiline">
            @foreach ($restaurants as $restaurant)
                <div class="column is-4">
                    <a href="{{ route('restaurants.show', $restaurant->id) }}">
                        <div class="card">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <p class="title is-4">{{ $restaurant->name }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="{{ $restaurant->logo }}" alt="Placeholder logo">
                                </figure>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
