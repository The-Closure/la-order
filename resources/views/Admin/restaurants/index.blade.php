@extends('layouts.app')

@section('title', 'Restaurants')

@section('content')
<div class="container">
  <div class="columns is-multiline">
    @foreach ($restaurants as $restaurant)
    <div class="column is-4">
      <a href="{{ route('Admin.restaurants.show', $restaurant->id) }}">
        <div class="card">
          <div class="card-image">
            <figure class="image is-4by3">
              <img src="{{ $restaurant->logo }}" alt="Placeholder image">
            </figure>
          </div>
          <div class="card-content">
            <div class="media">
              <div class="media-content">
                <p class="title is-4">{{ $restaurant->name }}</p>
                <p class="subtitle is-4">{{ $restaurant->phone }}</p>
                
              </div>
            </div>
        
            <div class="content">
                <p class="subtitle is-6">{{ $restaurant->working_hours }}</p>
                <p class="subtitle is-6">{{ $restaurant->epayment }}</p>
            </div>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
  {{ $restaurants->links() }}
</div>
@endsection