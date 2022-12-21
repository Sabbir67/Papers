@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center pt-5 text-black text-2xl"> <b> {{ $journal->title }}</b></h1>
        <p class="text-center  text-black ">{{ $journal->a1fname }} {{ $journal->a1lname }}</p>

        <p class="text-center  text-black ">Published Date : {{ $journal->jdate }}</p>
        <p class="text-center  text-black "> <b>Department :</b>  {{ $journal->department }} , <b>Session :</b>   {{ $journal->session }}, <b>Year:</b>  {{ $journal->year }}</p>

        <h3 class="pt-5 text-black text-l"><b>Abstract</b></h3>
        <p class="text-justift  text-black ">{{ $journal->abstract }}</p>
        <h4 class="text-l text-black pt-4 pb-4"><span><b>Keywords :</b> </span>  {{ $journal->keywards }}</h4>



        <div id="example1"></div>
        <script>PDFObject.embed("{{ $pdf }}", "#example1");</script>
    </div>
@endsection
