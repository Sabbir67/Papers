@extends('layouts.guest')

 @section('content')
    @if ($keys == null)
    <h1>No keywords found for this category.</h1>

    @endif
    @foreach ($keys as $keywords)

            <button class="p-4 bg-green-600">{{ ucwords($keywords) }}</button>

    @endforeach

@endsection
