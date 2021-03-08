@extends('layouts.app1')

@section('title', 'complete register')
@section('subtitle', 'hi mr ' . Auth::user()->name)

@section('content')
<div class="container">
    <form action="{{ route('delvierystore') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="field">
            <label class="label">working_hours</label>
            <div class="control">
                <input class="input {{ $errors->has('working_hours') ? 'is-danger':'' }}" type="text" name="working_hours" placeholder="working_hours..." value="{{ old('working_hours') }}">
            </div>
            <label class="label">vehicle</label>
            <div class="control">
                <input class="input {{ $errors->has('vehicle') ? 'is-danger':'' }}" type="text" name="vehicle" placeholder="vehicle..." value="{{ old('vehicle') }}">
            </div>

            <div class="field">
               <div class="control">
                   <button class="button is-link">submit</button>
               </div>
            </div>
    </form>

</div>
    
@endsection