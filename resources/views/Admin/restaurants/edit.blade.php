@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('restaurants.update', $restaurant) }}" method="post">
            @csrf
            <div class="field">
                <label class="label">name</label>
                <div class="control">
                    <input class="input {{ $errors->has('name') ? 'is-danger':'' }}" type="text" name="name" placeholder="Restaurant name ..." value="{{ old('name') ?? $restaurant->name }}">
                    @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">epayment</label>
                <div class="control">
                  <div class="select">
                    <select name="epayment">
                            <option value="direct">Direct</option>
                            <option value="visa">Visa</option>
                    </select>
                  </div>
                  @error('epayment')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">has_delivery</label>
                <div class="control">
                  <div class="select">
                    <select name="has_delivery">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                    </select>
                  </div>
                  @error('has_delivery')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
              </div>
            <div class="field">
                <label class="label">phone</label>
                <div class="control">
                    <input class="input {{ $errors->has('phone') ? 'is-danger':'' }}" type="text" name="phone" placeholder="phone ..." value="{{ old('phone') ?? $restaurant->phone }}">
                    <p class="help">a phone is something important to call</p>
                    @error('phone')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">logo</label>
                <div class="control">
                    <input class="input {{ $errors->has('logo') ? 'is-danger':'' }}" type="text" name="logo" placeholder="https://www.domain.com/test-image.jpg" value="{{ old('logo') ?? $restaurant->logo  }}">
                    @error('logo')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>  
            <div class="field">
                <label class="label">working_hours</label>
                <div class="control">
                    <textarea class="textarea {{ $errors->has('working_hours') ? 'is-danger':'' }}" name="working_hours" placeholder="Restaurant working_hours write here ..." value="{{ old('working_hours') ?? $restaurant->working_hours  }}">Working_hours</textarea>
                    @error('working_hours')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">rating</label>
                <div class="control">
                    <textarea class="textarea {{ $errors->has('rating') ? 'is-danger':'' }}" name="rating" placeholder="Restaurant rating write here ..." value="{{ old('rating') ?? $restaurant->rating  }}">Rating</textarea>
                    @error('rating')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <div class="control">
                  <button class="button is-link">Edit Post</button>
                </div>
              </div>
        </form>
    </div>
@endsection