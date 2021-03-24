@extends('layouts.app1')

@section('name meal', $meal->name)

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-6">
                <img src="{{ $meal->featured }}" alt="{{ $meal->name }}">
            </div>
            <div class="column is-6">
                <h3 class="title is-3">{{ $meal->name }}</h3>
                <h3 class="subtitle is-5">{{ $meal->category->name }}</h3>
                <div class="content">
                    {{ $meal->description }}
                </div>
                <p class="content">
                    creat at: {{ $meal->created_at }}
                </p>
            </div>
            <h3 class="subtitle is-5">{{ $meal->price }}</h3>
        </div>
        <div class="columns">
            <div class="column is-2">
                <a href="{{ route('restaurantmeals.edit', $meal->id) }}" class="button is-primary">Edit Meal</a>
            </div>
            <div class="column is-2">
                <form action="{{ route('restaurantmeals.destroy', $meal->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input class="button is-danger" type="submit" value="Delete Post">
                </form>
            </div>
        </div>
    </div>
@endsection
