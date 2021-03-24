@extends('layouts.app1')

@section('title', 'New Address' )

@section('content')
    <div class="container">
        <form action="{{ route('deliveryaddstore') }}" method="post">
            @csrf
            <div class="field">
                <label class="label">City</label>
                <div class="control">
                    <input class="input {{ $errors->has('city') ? 'is-danger':'' }}" type="text" name="city" placeholder="your city ..." value="{{ old('city') }}">
                    @error('city')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        
            <div class="field">
                <label class="label">Area</label>
                <div class="control">
                  <div class="select">
                    <select name="area_id">
                        @foreach ($areas as $name=>$id)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                  </div>
                  @error('area_id')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">Street</label>
                <div class="control">
                    <input class="input {{ $errors->has('street') ? 'is-danger':'' }}" type="text" name="street" placeholder="your street ..." value="{{ old('street') }}">
                    @error('street')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">Details</label>
                <div class="control">
                    <input class="input {{ $errors->has('details') ? 'is-danger':'' }}" type="text" name="details" placeholder="your details ..." value="{{ old('details') }}">
                    @error('details')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="field">
                <div class="control">
                  <button class="button is-link">Modify Address</button>
                </div>
              </div>
        </form>
    </div>
@endsection