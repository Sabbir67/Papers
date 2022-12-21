@extends('layouts.guest')

 @section('content')

<section class="p-5">

    <div class="grid grid-cols-1 sm:grid-cols-4 sm:gap-4 text-center ">




      <!-- featured Papers -->


      <div class="col-span-3  sm:pb-4 sm:pr-4">

        <h1 class="text-2xl font-bold p-3 ">Instruction to Author</h1>
        <ul class="text-left sm:pl-10 list-disc mt-2">
              <p class=""><b>How to Publish</b>  </p>
              <ul class="text-left pl-5 list-disc mt-2">
                <li>First you have to Crteate a Account from Sign Up Button</li>
                <li>Login the Dashboard</li>
                <li>Press Create A Journal Button</li>
                <li>Fill up the form wirh paper Title , Abstract, Key Words
                    , Category , Published Date, Author Details , and Manuscript (Pdf Format) </li>
                <li>You can add 1 to 3 author </li>
                <li>Key Words must be short and meaningful</li>
                <li>Press Submit Button</li>
                <li>Reviewer will publish the paper after review</li>

              </ul>

        </ul>

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






      </div>

    </div>

  </section>
  @endsection
