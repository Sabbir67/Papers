@extends('layouts.guest')
@section('content')
    <div class="p-4">
        <h1 class="text-center pt-2 text-2xl"> <b>{{ $journal->title }}</b> </h1>
        <p class="text-center ">{{ $journal->a1fname }} {{ $journal->a1lname }}</p>
        <p class="text-center"><b>Published Date : </b>{{ $journal->jdate }}</p>
        <p class="text-center"><b>Department: </b>{{ $journal->department }} , <b>Session: </b>{{ $journal->session }}, <b>Year: </b>{{ $journal->year }}</p>

        <div class="bg-gray-100 mb-3 p-3 pt-3 mt-4 rounded-l">
            <p> <b>Abstract :</b>  </p>
            <p>{{ $journal->abstract }}</p>

            <p class="mt-4"><b>Keywords :  {{ $journal->keywards }} </b></p>
        </div>


        <div id="example1"></div>
        <script>
            PDFObject.embed("{{ $pdf }}", "#example1");
        </script>
    </div>
@endsection
