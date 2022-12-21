@extends('layouts.guest')

 @section('content')

    @foreach ($journal_key as $keywords)
    <h1>{{ $keywords }}</h1>
    @endforeach
@endsection
