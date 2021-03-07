@extends('layouts.app1')

@section('title', "delivery man")

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-6">
                <h3 class="title is-3">{{ $delivery->id }}</h3>
                <h3 class="subtitle is-5">name{{ Auth::user()->name }}</h3>
                <div class="tags">
                </div>
                <div class="content">
                    {{ $delivery->vehicle }}
                </div>
                <p class="content">
                    delivery at: {{ $delivery->created_at }}
                </p>
            </div>
        </div>
    </div>
@endsection