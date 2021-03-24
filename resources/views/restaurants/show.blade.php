@extends('layouts.app1')

@section('title', $restaurants->name)

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-6">
                <img src="{{ $restaurants->logo }}" alt="{{ $restaurants->name }}">
            </div>
            <div class="column is-6">
                <h3 class="title is-5">{{ $restaurants->phone }}</h3>
                <h3 class="subtitle is-3">{{ $restaurants->has_delivery }}</h3>
                <div class="content">
                    {{ $restaurants->working_hours }}
                </div>
                <div class="content">
                    {{ $restaurants->rating }}
                </div>
                <p class="content">
                    The Payment Way: {{ $restaurants->epayment }}
                </p>
                <div class="card-footer">
                    <div class="content pt-5">
                        {{-- <a href="{{ route('meals.index') }}">Hi check meals</a> --}}
                        <div class="categories"> Categories:
                            @foreach ($categories as $category)
                                <a href="{{ route('restaurants.meals', ['rest_id' => $restaurants->id, 'cat_id' => $category->id]) }}"
                                    class="category is-primary">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
