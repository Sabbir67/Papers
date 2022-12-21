@extends('layouts.guest')

 @section('content')

      @include('layouts.messages')

      <section class="" style="background-color: skyblue ;">

        <div class="p-4 sm:p-10 sm:h-96 w-full bg-no-repeat h-full bg-cover " style="background-image: url('img/headBackground3.jpg');">

          <div class="sm:flex">

            <div class="sm:w-3/4 sm:pr-16" >
              <h1 class="text-white text-2xl md:text-2xl sm:text-2xl font-bold ">Confidence in Research</h1>
              <p class="text-white pt-2 sm:text-xl">Research Paper Management System is a one-stop online platform for all publications on various fields like Computer Science, Environmental Engineering, Mechanical Engineering, Robotics and Automation, Statistics, General Mathematics, Public Health, Energy, Social Science, and many more.</p>

              <div class="sm:flex pt-5 text-center">
                <button  class="bg-blue-800 hover:bg-blue-500 text-white font-bold sm:py-2 mb-3 p-2 sm:px-4 mr-4 border rounded"> <a href="{{ route('allpapers') }}"> View All Papers</a>

                </button>

                <button class="bg-blue-800 p-2 hover:bg-blue-500 text-white font-bold sm:py-2 sm:px-4 mb-3 border rounded"> <a href="{{ route('register') }}">Submit Your Paper Now</a>

                </button>
              </div>

            </div>

            <div class="h-60 bg-blue-500 bg-opacity-25  sm:w-1/4  border rounded p-7 text-center ">
              <div class="">
                <h2 class="text-white opacity-100 text-center text-2xl">Call for Papers</h2>

              <p class="font-bold text-white ">Research Paper Management System determined to ensure high-quality, original publications. </p>

              <button class="mt-4 bg-red-500 hover:bg-pink-700 text-white font-bold py-2 px-4 border rounded"> <a href="{{ route('register') }}">
                Submit Your Paper </a>
              </button>
              </div>
            </div>

          </div>


        </div>

      </section>


      <!-- 2nd Section -->

      <section class="p-5">

        <div class="grid grid-cols-1 sm:grid-cols-3 sm:gap-4 text-center ">

          <div class="  bg-slate-50 pb-4">

            <h1 class="bg-blue-400 text-xl font-bold p-1 text-white  ">Categories</h1>
            <ul class="text-left pl-10 list-disc mt-2">
                @foreach ($category as $categories )
                    <a href="/category/{{ $categories->id }}"><li  class=" text-l ">{{ $categories->title }}</li></a>
                @endforeach


            </ul>

          </div>


          <!-- featured Papers -->


          <div class="col-span-2 bg-indigo-50 first-line:pb-4">

            <h3 class="bg-indigo-500 text-xl font-bold p-1 text-white ">Keywords</h3>
            @foreach ($key as $keys)
                <a href="/search?query={{str_replace(' ','+',$keys)}}" class="p-3">{{ ucwords($keys) }}</a>
            @endforeach




          </div>



        </div>

      </section>


      {{-- Paper Section --}}

      <section class="p-5">

        <div class="grid grid-cols-1 sm:grid-cols-1 sm:gap-4 text-center ">



          <!-- featured Papers -->


          <div class="col-span-1 bg-indigo-50 pb-4">

            <h3 class="bg-indigo-400 text-xl font-bold p-1 text-white ">All Papers</h3>
            <ul class="text-left pl-10 list-disc mt-2">
                @foreach ($journals as $journal)
                <a href="/paperview/{{ $journal->id }}"><li  class=" text-l hover:text-green">{{ $journal->jtitle }}</li></a>

                @endforeach
            </ul>

          </div>



        </div>

      </section>









      <!-- Recent Paper  -->



      <section class="p-5">
        <h1 class="text-3xl pt-3 pb-3  font-medium  ">Recent Paper</h1>

        <div class="grid grid-cols-1 sm:grid-cols-4 sm:gap-4 ">


          @foreach ($journals as $journal)

          <div class="bg-indigo-200 mb-3 w-full pt-6 rounded-2xl">


            <!-- <img class=" object-contain h-40 rounded " src="img/profile2.png" alt=""> -->
            <div class="flex flex-col justify-center items-center"> <img class=" object-contain h-40 rounded-full " src="img/profile2.png" alt=""></div>

            <div class="text-center p-3">
              <p>{{ $journal->a1fname }}</p>
              <p>{{ $journal->jcreated_at }}</p>
              <p>{{ $journal->jtitle }}</p>

            </div>

            <div class="grid sm:grid-cols-1 align-bottom">
              <a href="/paperview/{{ $journal->id }}"><div class="bg-blue-900 text-center h-12 text-bold text-white pt-2">  View Paper</div> </a>

            </div>

          </div>

          @endforeach

        </div>

      </section>


      <!-- 3nd Section -->

      <section class="">


        <div class="grid grid-cols-2 sm:grid-cols-4 sm:gap-4 text-center bg-blue-100">

          <div class="pb-4">

            <h1 class="text-2xl font-bold sm:text-3xl sm:font-bold sm:p-3">50+</h1>
            <p class=" sm:text-xl ">Paper Publish</p>



          </div>


          <!-- featured Papers -->


          <div class=" pb-4">

            <h1 class="text-2xl font-bold sm:text-3xl sm:font-bold sm:p-3">50+</h1>
            <p class=" sm:text-xl ">Indexing</p>


          </div>

          <!-- part 3 Notice -->

          <div class="pb-4">

            <h1 class="text-2xl font-bold sm:text-3xl sm:font-bold sm:p-3">10000+</h1>
            <p class=" sm:text-xl ">Connected Student</p>

          </div>

          <!-- part 4 -->

          <div class="pb-4">

            <h1 class="text-2xl font-bold sm:text-3xl sm:font-bold sm:p-3">10+</h1>
            <p class=" sm:text-xl ">Years Experience</p>

          </div>

        </div>

      </section>
@endsection
