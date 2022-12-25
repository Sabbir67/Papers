@extends('layouts.guest')

 @section('content')
<section class="p-5">

    <div class="grid grid-cols-1 sm:grid-cols-4 sm:gap-4 text-center ">




      <!-- featured Papers -->


      <div class="col-span-4  pb-4 pr-4">

        <h1 class="text-2xl font-bold p-3 ">Editorial Board</h1>
        <div class="grid grid-cols-1 sm:grid-cols-3 sm:gap-5 ">

          <div class="bg-indigo-200 mb-3  w-full pt-6 rounded-2xl">


            <!-- <img class=" object-contain h-40 rounded " src="img/profile2.png" alt=""> -->
            <div class="flex flex-col justify-center items-center">
                <a href="#" class="flex items-center py-4 px-2">
                    <img src="{{ asset("img/fazlulKarimPatwary.jpeg") }}" class=" object-contain h-40 rounded-full "alt="">

                </a></div>

            <div class="text-center p-3">
              <p><b>Md. Fazlul Karim Patwary</b> </p>
              <p>Professor, Institute of Information Technology </p>

            </div>

          </div>

        </div>

      </div>

      <!-- part 3 Notice -->

    </div>

  </section>
  @endsection
