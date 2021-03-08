@extends('layouts.app1')

@section('title', 'Edit: ' . Auth::user()->name)

@section('content')
    <div class="container">
        <form action="{{ route('delivery.update', $delivery->id) }}" method="post">
            <input name="_method" type="hidden" value="PUT">
            @csrf
            <div class="field">
                <label class="label">working_hours</label>
                <div class="control">
                    <input class="input {{ $errors->has('working_hours') ? 'is-danger':'' }}" type="text" name="working_hours" placeholder="working_hours ..." value="{{ old('working_hours') ?? $delivery->working_hours }}">
                    @error('title')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">vehicle</label>
                <div class="control">
                    <input class="input {{ $errors->has('vehicle') ? 'is-danger':'' }}" type="text" name="vehicle" placeholder="vehicle ..." value="{{ old('vehicle') ?? $delivery->vehicle }}">
                    @error('title')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <div class="control">
                  <button class="button is-link">edit delivery</button>
                </div>
              </div>
        </form>
    </div>
@endsection