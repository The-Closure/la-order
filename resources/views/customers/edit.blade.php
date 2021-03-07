@extends('layouts.app')

@section('title', 'Edit: Information About Customer' )

@section('content')
    <div class="container">
        <form action="{{ route('customers.update', $customer->id) }}" method="post">
            <input name="_method" type="hidden" value="PUT">
            @csrf
            <div class="field">
                <label class="label">email</label>
                <div class="control">
                    <input class="input {{ $errors->has('email') ? 'is-danger':'' }}" type="text" name="email" placeholder="your email ..." value="{{ old('email') ?? $customer->email }}">
                    @error('email')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
           

            <div class="field">
                <label class="label">password</label>
                <div class="control">
                    <input class="input {{ $errors->has('password') ? 'is-danger':'' }}" type="text" name="password" placeholder="your password ..." value="{{ old('password') ?? $customer->password }}">
                    @error('password')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">phone</label>
                <div class="control">
                    <input class="input {{ $errors->has('street') ? 'is-danger':'' }}" type="text" name="phone" placeholder="your phone ..." value="{{ old('phone') ?? $customer->phone }}">
                    @error('phone')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            

            <div class="field">
                <div class="control">
                  <button class="button is-link">Modify Customer Information</button>
                </div>
              </div>
        </form>
    </div>
@endsection