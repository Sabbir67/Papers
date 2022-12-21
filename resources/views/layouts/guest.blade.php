<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Research Project</title>

    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet" type="text/css" >
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="{{asset('js/pdfobject.js')}}"></script>
    <style>
      .pdfobject-container { height:100rem; border: 1rem solid rgba(0,0,0,.1); }

      .backgroundImage{
        background-image: image('img/headBackground.jpg');

        height: 300px;
      }

    </style>
  </head>


  <body>

    <header>

      <div id="header">
        <div>
          <nav class="bg-white shadow-lg">
              <div class="max-w-6xl mx-auto px-4">
                <div class="flex justify-between">
                  <div class="flex space-x-7">
                    <div>
                      <!-- Website Logo -->
                      <a href="#" class="flex items-center py-4 px-2">
                        <img  href="{{ route('home') }}" src="{{ asset("img/logo-ju.png") }}" alt="Logo" class="h-16 w-64 mr-2">

                      </a>
                    </div>
                    <!-- Primary Navbar items -->
                    <div class="hidden md:flex items-center space-x-1">
                      <a href="{{ route('home') }}" class="py-4 px-2 text-green-500 border-b-4 border-green-500 font-semibold ">Home</a>

                      <a href="{{ route('category') }}" class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300">All Categories</a>

                      <a href="{{ route('allpapers') }}" class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300">All Papers</a>

                      <a href="{{ route('editorialmember') }}" class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300">Editorial Board</a>

                      <a href="{{ route('aboutus') }}" class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300">About Us</a>

                      <a href="{{ route('instruction') }}" class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300">Instructions</a>
                    </div>
                  </div>
                  <!-- Secondary Navbar items -->

                  @if (auth()->guard('web')->user())

                  {{-- <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  Logout
                </a> --}}

              <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">
                  {{ csrf_field() }}
              </form>

              <div class="hidden md:flex items-center space-x-3 ">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-green-500 hover:text-white transition duration-300">Log Out</a>

                <a href="{{ route('dashboard') }}" class="py-2 px-2 font-medium text-white bg-green-500 rounded hover:bg-green-400 transition duration-300">Dashboard</a>
              </div>

              @else

                  <div class="hidden md:flex items-center space-x-3 ">
                    <a href="{{ route('login') }}" class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-green-500 hover:text-white transition duration-300">Log In</a>
                    <a href="{{ route('register') }}" class="py-2 px-2 font-medium text-white bg-green-500 rounded hover:bg-green-400 transition duration-300">Sign Up</a>
                  </div>

                @endif
                  <!-- Mobile menu button -->
                  <div class="md:hidden flex items-center">
                    <button class="outline-none mobile-menu-button">
                    <svg class=" w-6 h-6 text-gray-500 hover:text-green-500 "
                      x-show="!showMenu"
                      fill="none"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                  </button>
                  </div>
                </div>
              </div>
              <!-- mobile menu -->
              <div class="hidden mobile-menu">
                <ul class="">
                  <li class="active"><a href="index.html" class="block text-sm px-2 py-4 text-white bg-green-500 font-semibold">Home</a></li>
                  <li><a href="allcategories.html" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">All Categories</a></li>
                  <li><a href="allpaper.html" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">All Papers</a></li>
                  <li><a href="editorialboard.html" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">Editorial Board</a></li>
                  <li><a href="aboutus.html" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">About Us</a></li>
                  <li><a href="instructions.html" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">Instructions</a></li>
                </ul>
              </div>
              <script>
                const btn = document.querySelector("button.mobile-menu-button");
                const menu = document.querySelector(".mobile-menu");

                btn.addEventListener("click", () => {
                  menu.classList.toggle("hidden");
                });
              </script>
            </nav>
      </div>
      </div>

    </header>

            @yield('content')

            <section class="">

                <div class="grid grid-cols-1 sm:grid-cols-4 sm:gap-4 text-center bg-blue-900 p-3">

                  <div class="sm:pb-4 sm:pl-10">

                    <h3 class="text-xl font-bold text-white text-left">About Us</h3>
                    <p class="text-white text-left">Research Paper Management System is a one-stop online platform for all publications on various fields like Computer Science, Environmental Engineering, Mechanical Engineering, Robotics and Automation, Statistics, General Mathematics, Public Health, Energy, Social Science, and many more.</p>


                  </div>


                  <!-- featured Papers -->


                  <div class="pt-3 sm:pb-4 sm:pl-4">

                    <h3 class="text-xl font-bold text-white text-left">Quick Links</h3>
                    <ul class="text-left pl-5 list-disc mt-2 text-white">
                        <li  class=""> <a href="{{ route('home') }}">Home</a></li>
                        <li  class=""> <a href="{{ route('category') }}">All Categories</a></li>
                        <li  class=""> <a href="{{ route('allpapers') }}">All Papers</a></li>
                        <li  class=""> <a href="{{ route('editorialmember') }}">Editorial Board</a></li>
                        <li  class=""> <a href="{{ route('aboutus') }}">About Us</a></li>
                        <li  class=""> <a href="{{ route('instruction') }}">Instructions</a></li>




                    </ul>


                  </div>

                  <!-- part 3 Notice -->

                  <div class="pt-3 sm:pb-4 sm:col-span-2">

                    <h1 class="text-xl font-bold text-white text-left">Quick Links</h1>
                    <ul class="text-left pl-5 list-disc mt-2 text-white">

                      <li  class="">Tearms & Condition</li>
                      <li  class="">Privacy Policy</li>


                    </ul>

                  </div>

                  <!-- part 4 -->



                </div>

              </section>


              <!-- 5th Section -->

              <section class="">

                <div class="grid grid-cols-1 sm:grid-cols-1 sm:gap-4 text-center bg-blue-900 p-3">

                  <div class="sm:pb-4 sm:pl-10">


                    {{-- <p class="text-white text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, accusantium vitae voluptatibus eum odio non minima molestiae maxime ut, expedita quae? Eveniet enim dolore ad aut, sapiente eaque accusamus praesentium est. Vero quaerat odit dolor. Tempore officiis pariatur autem ipsa asperiores aut illum, minima facere, vitae voluptate quos nam? Error quam molestiae illum, ea a eum, harum iste, quibusdam sapiente optio soluta incidunt quae ut necessitatibus magnam placeat quos? Minima eligendi debitis, provident consectetur ipsam, voluptates architecto placeat dolor autem exercitationem adipisci quisquam eius deserunt fuga ea cum consequatur beatae vero vitae reprehenderit dicta delectus facere libero. Nisi, dicta earum.</p> --}}


                  </div>

                </div>

              </section>




              <section class="">

                <div class="grid grid-cols-1 sm:grid-cols-1 sm:gap-4 text-center bg-blue-800 p-3">

                  <div class="sm:pb-4 sm:pl-10">


                    <p class="text-white text-center ">@ Copyright : Jahangirnagar University , IIT Department</p>


                  </div>

                </div>

              </section>



            </body>
          </html>

