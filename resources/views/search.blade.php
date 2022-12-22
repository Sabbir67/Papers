@extends('layouts.guest')
@section('content')
<br>
@if ($result)
    @if ($result->count())
    <h1>{{ $result->count() }} results found.</h1>
    @foreach ($result as $re)
        <div class="p-4 m-4 bg-gray-400 rounded">
            <h1 class="text-black">{{ $re->title }}</h1>
            <p>{{ substr($re->abstract, 0, 150) }}</p>
        </div>


    @endforeach
    {{ $result->links() }}
    @else
    <p>No result found</p>
    @endif
@endif
@endsection
