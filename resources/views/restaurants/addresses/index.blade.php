@extends('layouts.app1')

@section('title', 'Details Address')

@section('content')
<div class="container">
  <a class="button is-success" href="{{ route('addresses.create') }}">New Address</a>
  <div class="columns is-multiline">
    @foreach ($addresses as $address)
    <div class="column is-4">
      <a href="{{ route('addresses.show', $address->id) }}">
          <div class="card-content">
            <div class="media">
              <div class="media-content">
                <p class="title is-4">{{ $address->city }}</p>
                <p class="subtitle is-6">{{ $address->area->name }}</p>
                <p class="subtitle is-6">{{ $address->street }}</p>
                <p class="subtitle is-6">{{ $address->details }}</p>
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