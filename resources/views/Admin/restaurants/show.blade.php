@extends('layouts.app1')

@section('title', $restaurant->name)

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-6">
                <img src="{{ $restaurant->logo }}" alt="{{ $restaurant->name }}">
            </div>
            <div class="column is-6">
                <p class="title is-4">{{ $restaurant->rating }}</p>
                <p class="subtitle is-4">{{ $restaurant->phone }}</p>
                <div class="content">
                    <p class="subtitle is-6">{{ $restaurant->working_hours }}</p>
                    <p class="subtitle is-6">{{ $restaurant->epayment }}</p>
                </div>
                
                <p class="content">
                    <p class="subtitle is-6">{{ $restaurant->has_delivery }}</p>
                    <p class="subtitle is-6">{{ $restaurant->working_hours }}</p>
                    restauranted at: {{ $restaurant->created_at }}
                </p>
            </div>
        </div>
        <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="button is-primary">Edit restaurant information</a>
        <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="restaurant">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <input class="button is-danger" type="submit" value="Delete restaurant">
        </form>
    </div>
@endsection