@extends('layouts.app1')

@section('title',' Meals')

@section('content')
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th><abbr title="featured">featured</abbr></th>
            <th><abbr title="name">Name</abbr></th>
            <th><abbr title="desc">Desc</abbr></th>
            <th><abbr title="status">Status</abbr></th>
            <th><abbr title="price ">Price</abbr></th>
            <th><abbr title="option ">option</abbr></th>
        </tr>
        </thead>
        <tbody>
            @foreach ($meals as $meal)
                <tr>
                    <td>{{ $meal->featured }}</td>
                    <td>{{ $meal->name }}</td>
                    <td>{{ $meal->desc }}</td>
                    <td>{{ $meal->status }}</td>
                    <td>{{ $meal->price }}</td>
                    <td> <a href="{{ route(meal.edit,$meal->id) }}">Edite </td>
                    <td>
                        
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection