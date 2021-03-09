@extends('layouts.app1')

@section('title', 'Information About Customer')

@section('content')
<div class="container">
  <div class="columns is-multiline">
    @foreach ($customers as $customer)
    <div class="column is-4">
      <a href="{{ route('customers.show', $customer->id) }}">
        
          <div class="card-content">
            <div class="media">
              <div class="media-content">
                <p class="title is-4">{{ $customer->name }}</p>
                <p class="subtitle is-6">{{ $customer->email }}</p>
                <p class="subtitle is-6">{{ $customer->password }}</p>
                <p class="subtitle is-6">{{ $customer->phone }}</p>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>
@endsection