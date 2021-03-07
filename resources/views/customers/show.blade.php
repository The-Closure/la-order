@extends('layouts.app')

@section('title', 'Information About Customer')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-6">
                <h3 class="title is-3">{{ $customer->name }}</h3>
            </div>



            <div class="content">
                {{ $customer->email }}
            </div>
           
           
            <div class="content">
                {{ $customer->password }}
            </div>
            <div class="content">
                {{ $customer->phone }}
            </div>
        </div>
    </div>
    <a href="{{ route('customeres.edit', $customer->id) }}" class="button is-primary">Edit Customer</a>
   
    </div>
@endsection
