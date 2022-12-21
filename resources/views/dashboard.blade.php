@extends('layouts.app')
@section('content')
    <h1 class="text-center text-2xl pb-2 pt-1"><b>DASHBOARD</b></h1>

    <div class="grid grid-cols-1 sm:grid-cols-3 sm:gap-4 ">

        <div class="bg-red-500 mb-3 w-full pt-3 rounded-2xl">

            <div class="text-center p-3">
                <h1 class="text-white"> <b>Total Paper</b></h1>
                <h2 class="text-white text-3xl">{{ $paperCount }}</h2>
            </div>
        </div>
        <div class="bg-green-500 mb-3 w-full pt-3 rounded-2xl ">

            <div class="text-center p-3">
                <h1 class="text-white"><b>Total Category</b></h1>
                <h2 class="text-white text-3xl">{{ $categoryCount }}</h2>
            </div>
        </div>
        


    </div>
@endsection
