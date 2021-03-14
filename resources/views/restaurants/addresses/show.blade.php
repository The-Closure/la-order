@extends('layouts.app1')

@section('title', 'Details Address')
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
    <a href="{{ route('owneraddedit', $address->id) }}" class="button is-primary">Edit address</a>
   
    </div>
@endsection
