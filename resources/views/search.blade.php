@extends('layouts.guest')
@section('content')
<form action="/search" method="get">
    <input type="search" id="query" class="" name="query" placeholder="Search of Keywords....">
    <button type="submit" class="p-3">Search</button>
</form>
@if ($result)
    @if ($result->count())
    @foreach ($result as $re)
        {{ $re->title }}
    @endforeach
    @else
    <p>No result found</p>
    @endif
@endif
@endsection
