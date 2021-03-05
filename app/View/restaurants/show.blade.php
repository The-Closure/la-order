@extends('layouts.app')

@section('title', $restaurants->name)

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-6">
                <img src="{{ $restaurants->logo }}" alt="{{ $restaurants->name }}">
            </div>
            <div class="column is-6">
                <h3 class="title is-3">{{ $restaurants->phone}}</h3>
                <h3 class="subtitle is-5">{{ $restaurants->has_delivery}}</h3>
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
        </div>
    </div>
@endsection
