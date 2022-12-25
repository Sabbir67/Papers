@extends('layouts.guest')

 @section('content')
<section class="p-5">

    <div class="grid grid-cols-1 sm:grid-cols-4 sm:gap-4 text-center ">




      <!-- featured Papers -->


      <div class="col-span-4  pb-4 pr-4">

        <h1 class="text-2xl font-bold p-3 ">All Papers</h1>
        <div class="grid grid-cols-1 sm:grid-cols-4 sm:gap-5 ">

            {{-- $journal = substr($journalsmall, 0, 150); --}}
            @foreach ($journals as $journal)

          @php
                $journal_ab = substr($journal->abstract, 0, 150);
          @endphp





            <div class="bg-indigo-100 mb-3   w-full pt-6 rounded-2xl">

                <div class="text-left  p-3">
                  <p><span class="font-bold">  Paper Title : </span> {{ $journal->jtitle }} </p>
                  <p> <span class="font-bold">Author : </span>{{ $journal->a1fname }} {{ $journal->a1lname }}</p>
                  <p> <span class="font-bold">Department : </span> {{ $journal->department }} ,{{ $journal->session }} , {{ $journal->year }}</p>
                  <p><span class="font-bold">Date : </span>{{ $journal->jcreated_at }} </p>
                  <p> <span class="font-bold">Keywords : </span>{{ $journal->keywards }}</p>
                  <p><span class="font-bold">Abstract : </span>{{ $journal_ab}} </p>

                  <br>

                  <a  href="/paperview/{{ $journal->id }}"><div class=" text-center text-bold text-white font-bold pt-1 bg-blue-500 h-8 hover:bg-green-500 hover:text-white">  View Paper</div> </a>

                  {{-- <button href="/paperview/{{ $journal->id }}" class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold sm:py-2 mb-3 p-2 sm:px-4 mr-4 border rounded">
                     Read Now
                    </button> --}}
                </div>

            </div>

            @endforeach

        </div>

      </div>



    </div>

  </section>


  @endsection
