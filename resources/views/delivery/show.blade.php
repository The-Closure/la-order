@extends('layouts.app1')

@section('title', 'delivery man')
@section('subtitle', 'welcom mr ' . Auth::user()->name)

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-6">
                <h3 class="title is-5">your id: {{ $delivery->id }}</h3>
                <h3 class="subtitle is-5">your name: {{ Auth::user()->name }}</h3>
                <div class="tags">
                </div>
                <div class="content">
                    your vehicle: {{ $delivery->vehicle }}
                </div>
                <p class="content">
                    delivery at: {{ $delivery->created_at }}
                </p>
                <div class="columns">
                    <a href="{{ route('deliveryedit', $delivery->id) }}" class="button is-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
