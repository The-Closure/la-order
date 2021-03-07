@extends('layouts.app')

@section('title', 'Edit: Details Address' )

@section('content')
    <div class="container">
        <form action="{{ route('address.update', $address->id) }}" method="post">
            <input name="_method" type="hidden" value="PUT">
            @csrf
            <div class="field">
                <label class="label">City</label>
                <div class="control">
                    <input class="input {{ $errors->has('city') ? 'is-danger':'' }}" type="text" name="city" placeholder="your city ..." value="{{ old('city') ?? $address->city }}">
                    @error('city')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
           

            <div class="field">
                <label class="label">Area</label>
                <div class="control">
                    <input class="input {{ $errors->has('area') ? 'is-danger':'' }}" type="text" name="area" placeholder="your area ..." value="{{ old('area') ?? $address->area }}">
                    @error('city')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">Street</label>
                <div class="control">
                    <input class="input {{ $errors->has('street') ? 'is-danger':'' }}" type="text" name="street" placeholder="your street ..." value="{{ old('street') ?? $address->street }}">
                    @error('street')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">Details</label>
                <div class="control">
                    <input class="input {{ $errors->has('details') ? 'is-danger':'' }}" type="text" name="details" placeholder="your details ..." value="{{ old('details') ?? $address->details }}">
                    @error('details')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="field">
                <div class="control">
                  <button class="button is-link">Modify Post</button>
                </div>
              </div>
        </form>
    </div>
@endsection