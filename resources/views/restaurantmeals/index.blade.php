@extends('layouts.app1')

@section('content')

<div class="container">
    <div class="columns is-multiline">
        @foreach ($meals as $meal)
        <div class="columns is-4">
            <a href="{{ route('restaurantmeals.show', $meal) }}">
            <div class="card">
                <div class="card-image">
                  <figure class="image is-4by3">
                    <img src="{{ $meal->featured }}" alt="Placeholder image">
                  </figure>
                </div>
                    <div class="media-content">
                      <p class="title is-4">{{ $meal->name }}</p>
                      <p class="subtitle is-6">{{ $meal->category->name}}</p>
                    </div>
                  </div>

                  <div class="content">
                    {{ $meal->desc }}
                    <br>
                    <br>
                  </div>
                    <div class="content">
                        {{ $meal->price }}
                    </div>
                    <div class="content">
                        {{ $meal->status }}
                    </div>
                </div>
              </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection
