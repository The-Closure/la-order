@extends('layouts.app1')

@section('content')
    <div class="container">
        <form action="{{ route('admin.meals.store') }}" method="post">
            @csrf
            <div class="field">
                <label class="label">name</label>
                <div class="control">
                    <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" name="name"
                        placeholder="Restaurant name ..." value="name">
                    @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">featured_image</label>
                <div class="control">
                    <input class="input {{ $errors->has('featured') ? 'is-danger' : '' }}" type="text" name="featured"
                        placeholder="https://www.domain.com/test-image.jpg" value="featured">
                    @error('featured')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">description</label>
                <div class="control">
                    <textarea class="textarea {{ $errors->has('desc') ? 'is-danger' : '' }}" name="desc"
                        placeholder="Post desc goes here ...">{{ old('desc') }}</textarea>
                    @error('desc')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">status</label>
                <div class="control">
                    <div class="select">
                        <select name="status">
                            <option value="available">Available</option>
                            <option value="notavailable">Not available</option>
                        </select>
                    </div>
                    @error('status')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">price</label>
                <div class="control">
                    <input class="input {{ $errors->has('price') ? 'is-danger' : '' }}" type="text" name="price"
                        placeholder="price ..." value="price">
                    <p class="help">a price is something important to call</p>
                    @error('price')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button class="button is-link">Save Meal</button>
                </div>
            </div>
        </form>
    </div>
@endsection
