@extends('layouts.app')

@section('title', 'Information About Customer')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-6">
                <h3 class="title is-3">{{ $address->city }}</h3>
            </div>



            <div class="content">
                {{ $address->street }}
            </div>
           
           
            <div class="content">
                {{ $address->details }}
            </div>
           
        </div>
    </div>
    <a href="{{ route('addresses.edit', $address->id) }}" class="button is-primary">Edit Address</a>
   
    </div>
@endsection
