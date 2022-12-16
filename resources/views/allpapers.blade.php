@extends('layouts.guest')

 @section('content')
<section class="p-5">

    <div class="grid grid-cols-1 sm:grid-cols-4 sm:gap-4 text-center ">




      <!-- featured Papers -->


      <div class="col-span-3  pb-4 pr-4">

        <h1 class="text-2xl font-bold p-3 ">All Papers</h1>
        <div class="grid grid-cols-1 sm:grid-cols-3 sm:gap-5 ">

        {{-- $journal = substr($journalsmall, 0, 150); --}}
            @foreach ($journals as $journal)

          @php
                $journal_ab = substr($journal->abstract, 0, 150);
          @endphp





            <div class="bg-indigo-200 mb-3  w-full pt-6 rounded-2xl">

                <div class="text-left  p-3">
                  <p><span class="font-bold">  Paper Title :</span> {{ $journal->jtitle }} </p>
                  <p> <span class="font-bold">Author :</span>{{ $journal->a1fname }}</p>
                  <p><span class="font-bold">Description :</span>{{ $journal_ab}} </p>
                  <p><span class="font-bold">Date :</span>{{ $journal->jcreated_at }} </p>
                  <button class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold sm:py-2 mb-3 p-2 sm:px-4 mr-4 border rounded">
                     Read Now
                    </button>
                </div>

              </div>

            @endforeach












        </div>

      </div>

      <!-- part 3 Notice -->

      <div class=" pb-4">


          <div class="bg-indigo-200">
              <h1 class="bg-blue-500 text-2xl font-bold p-3 text-white ">Categories</h1>
              <ul class="text-left pl-10 list-disc mt-2">
                @foreach ($category as $categories )
                <li  class=" text-xl ">{{ $categories->title }}</li>
                @endforeach

              </ul>
          </div>

{{--
          <div class="mt-5 bg-indigo-200">
              <h1 class="bg-blue-500 text-2xl font-bold p-3 text-white">Notice</h1>
              <ul class="text-left pl-10 list-disc mt-2">


              </ul>
          </div> --}}



      </div>

    </div>

  </section>


  @endsection
