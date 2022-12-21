<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a  href="{{ route('home') }}"  class="flex items-center py-4 px-2">
                <img src="{{ asset("img/logo-ju.png") }}" alt="Logo" class="h-16 w-64 mr-2">

              </a>
        </x-slot>

        <form enctype="multipart/form-data"  method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- University Name -->
            <div class="mt-4">
                <x-input-label for="university_name" :value="__('University Name')" />
                <x-text-input id="university_name" class="block mt-1 w-full" type="text" name="university_name"
                    :value="old('university_name')" required />
                <x-input-error :messages="$errors->get('university_name')" class="mt-2" />
            </div>

            <!-- University ID -->
            <div class="mt-4">
                <x-input-label for="university_id" :value="__('University Id')" />
                <x-text-input id="university_id" class="block mt-1 w-full" type="text" name="university_id"
                    :value="old('university_id')" required />
                <x-input-error :messages="$errors->get('university_id')" class="mt-2" />
            </div>

            <!-- University Department -->
            <div class="mt-4">
                <x-input-label for="depertment" :value="__('Depertment')" />
                <x-text-input id="depertment" class="block mt-1 w-full" type="text" name="depertment"
                    :value="old('depertment')" required />
                <x-input-error :messages="$errors->get('depertment')" class="mt-2" />
            </div>

            <!-- Phone Number -->
            <div class="mt-4">
                <x-input-label for="phone_number" :value="__('Phone Number')" />
                <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                    :value="old('phone_number')" required />
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>

            <!-- Area of Interest -->
            <div class="mt-4">
                <x-input-label for="area_of_interest" :value="__('Area of Interest')" />
                <x-text-input id="area_of_interest" class="block mt-1 w-full" type="text" name="area_of_interest"
                    :value="old('area_of_interest')" required />
                <x-input-error :messages="$errors->get('area_of_interest')" class="mt-2" />
            </div>

            <div class="mt-4">
                <label class="block mb-2  text-gray-900 dark:text-white" for="large_size">Image</label>
                <input
                    class="block w-full mb-5 text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="large_size" type="file" name="image">
            </div>


            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
