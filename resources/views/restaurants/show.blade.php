@extends('layouts.app1')

@section('title', $restaurants->name)

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-6">
                <img src="{{ $restaurants->logo }}" alt="{{ $restaurants->name }}">
            </div>
            <div class="column is-6">
                <h3 class="title is-5">{{ $restaurants->phone}}</h3>
                <h3 class="subtitle is-3">{{ $restaurants->has_delivery}}</h3>
                <div class="content">
                    {{ $restaurants->working_hours}}
                </div>
                <div class="content">
                    {{ $restaurants->rating}}
                </div>
                <p class="content">
                     The Payment Way: {{ $restaurants->epayment }}
                </p>
            </div>
                <a href="{{ route('meals.index') }}">Hi check meals</a>
            <div class="card-footer">
                <div class="content pt-5">
                    <div class="categories">
                        @foreach ( $restaurants->meals as $meal )
                            <span class="category is-primary">{{ $meal->name }}</span>
                        @endforeach
            </div>
        </div>
    </div>
@endsection
