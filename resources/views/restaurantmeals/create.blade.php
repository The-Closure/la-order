@extends('layouts.app1')

@section('content')
    <div class="container">
        @error('name')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
        @error('desc')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
        @error('status')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
        @error('featured')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
        @error('price')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
        @error('category_id')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
        <form action="{{ route('restaurantmeals.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <label class="label">Name Meal</label>
                <div class="control">
                    <input class="input {{ $errors->has('name meal') ? 'is-danger' : '' }} " type="text" name='name'
                        placeholder="name meal ..."> {{ old('name meal') }}
                    @error('name-meal')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">Description</label>
                <div class="control">
                    <textarea class="textarea {{ $errors->has('description') ? 'is-danger' : '' }} " name='desc'
                        placeholder="Description of meal">{{ old('descrription') }}</textarea>
                    @error('description')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">Category</label>
                <div class="control">
                    <div class="select">
                        <select name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="file">
                <label class="file-label">
                    <input class="file-input" type="file" name="featured">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Choose a meal photo
                        </span>
                    </span>
                </label>
                @error('featured')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <label>
                <input type="radio" name="status" value="1">
                Active
            </label>
            <label>
                <input type="radio" name="status" value="0">
                Not Active
            </label>
            <div class="field">
                <label class="label">Price Meal</label>
                <div class="control">
                    <input class="input {{ $errors->has('price') ? 'is-danger' : '' }} " type="text" name='price'
                        placeholder="Price"> {{ old('price meal') }}
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
