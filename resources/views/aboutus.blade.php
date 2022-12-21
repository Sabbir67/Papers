@extends('layouts.guest')

 @section('content')

<section class="p-5">

    <div class="grid grid-cols-1 sm:grid-cols-4 sm:gap-4 text-center ">




      <!-- featured Papers -->


      <div class="col-span-3  pb-4 pr-4">

        <h1 class="text-2xl font-bold sm:p-3 ">About Us</h1>
        <ul class="text-left sm:pl-10 list-disc mt-2">
              <p>Research Paper Management System is a one-stop online platform for all publications on various fields like Computer Science, Environmental Engineering, Mechanical Engineering, Robotics and Automation, Statistics, General Mathematics, Public Health, Energy, Social Science, and many more.
            </p>
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
