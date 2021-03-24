@extends('layouts.app1')

@section('title', 'complete register')
@section('subtitle', 'hi mr ' . Auth::user()->name)

@section('content')
<div class="container">
    <form action="{{ route('restaurants.store') }}" method="post">
        @csrf
        <div class="field">
            <label class="label">restaurant name</label>
            <div class="control">
                <input class="input {{ $errors->has('name') ? 'is-danger':'' }}" type="text" name="name" placeholder="restaurant name..." value="{{ old('name') }}">
            </div>

            <label class="label">phone</label>
            <div class="control">
                <input class="input {{ $errors->has('phone') ? 'is-danger':'' }}" type="text" name="phone" placeholder="phone..." value="{{ old('phone') }}">
            </div>

            <label class="label">logo</label>
            <div class="control">
                <input class="input {{ $errors->has('logo') ? 'is-danger':'' }}" type="text" name="logo" placeholder="logo..." value="{{ old('logo') }}">
            </div>

            <label class="label">working_hours</label>
            <div class="control">
                <input class="input {{ $errors->has('working_hours') ? 'is-danger':'' }}" type="text" name="working_hours" placeholder="working_hours..." value="{{ old('working_hours') }}">
            </div>

            <label class="label">epayment</label>
            <div class="control">
                <input class="input {{ $errors->has('epayment') ? 'is-danger':'' }}" type="text" name="epayment" placeholder="epayment..." value="{{ old('epayment') }}">
            </div>

            <div class="control">
                <h3>Do you need delivery </h3>
                <label class="radio">
                  <input type="radio" name="has_delivery">
                  No
                </label>
                <label class="radio">
                  <input type="radio" name="has_delivery" checked>
                  Yes
                </label>
              </div>

            <div class="field">
               <div class="control">
                   <button class="button is-link">submit</button>
               </div>
            </div>
    </form>

</div>
    
@endsection