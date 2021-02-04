@extends('layouts.app')

@section('content')
<body>
    <div class="flex justify-center bg-white shadow overflow-hidden border-4 pt-6 m-12 rounded-lg">



        <!-- Validation Errors -->
        

        <form method="POST" action="/invig/submisconduct">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            @csrf
            @if (\Session::has('error'))
<div class="alert alert-success w-full bg-red-500 text-white rounded-sm" name="error" id="error">
    <ul>
        <li>{!! \Session::get('error') !!}</li>
    </ul>
</div>
@endif
            
               

              <!-- <img class="block h-14 w-14 justify-center" src="https://cdn3.iconfinder.com/data/icons/avatars-round-flat/33/man4-512.png" alt="avatar">-->

              <h3></h3>

            <!-- Header -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <div class="pl-4 flex items-center">
                <div class="toggleColour text-black no-underline hover:no-underline font-bold text-2xl lg:text-4xl text-center">
                  <svg class="h-8 fill-current inline" id="Layer_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="60" xmlns="http://www.w3.org/2000/svg"><g><g id="XMLID_277_"><g id="XMLID_278_"><g id="XMLID_281_"><g id="XMLID_282_"><g id="XMLID_283_"><g id="XMLID_284_"><g id="XMLID_285_"><g id="XMLID_286_"><g id="XMLID_287_"><g id="XMLID_288_"><g id="XMLID_289_"><g id="XMLID_290_"><g id="XMLID_291_"><g id="XMLID_292_"><circle id="XMLID_293_" cx="256" cy="256" fill="#08475e" r="256"/></g></g></g></g></g></g></g></g></g></g></g></g></g></g><path d="m511.276 275.338c-48.783-48.783-207.288-207.288-207.288-207.288l-235.938 235.938 207.288 207.288c125.967-9.409 226.53-109.971 235.938-235.938z" fill="#05303d"/><g><g><path d="m237.253 236.546-102.265-102.265.314-3.457 62.774-62.774c29.247-29.247 76.665-29.247 105.912 0 29.247 29.247 29.247 76.665 0 105.912l-62.774 62.774z" fill="#fff"/><g><path d="m303.984 173.961-62.77 62.77-3.96-.184-50.883-50.883 117.613-117.613c14.623 14.623 21.934 33.785 21.934 52.948.001 19.177-7.311 38.339-21.934 52.962z" fill="#d1fefb"/></g><path d="m68.05 303.988c-29.247-29.247-29.247-76.665 0-105.912l67.252-67.252 105.912 105.912-67.252 67.252c-29.247 29.247-76.665 29.247-105.912 0z" fill="#45f6ff"/><path d="m241.214 236.731-67.253 67.253c-29.246 29.246-76.664 29.246-105.91 0l120.208-120.208z" fill="#5ecbf1"/></g><g><path d="m274.747 275.454 102.265 102.265-.314 3.457-62.774 62.774c-29.247 29.247-76.665 29.247-105.912 0-29.247-29.247-29.247-76.665 0-105.912l62.774-62.774z" fill="#fff"/><path d="m376.696 381.179-62.77 62.77c-29.246 29.246-76.664 29.246-105.91 0l117.613-117.613 51.385 51.385z" fill="#d1fefb"/><path d="m443.95 208.012c29.247 29.247 29.247 76.665 0 105.912l-67.252 67.252-105.912-105.912 67.252-67.252c29.247-29.247 76.665-29.247 105.912 0z" fill="#ff405c"/><g><path d="m443.949 313.926-67.253 67.253-52.955-52.955 120.208-120.208c29.246 29.246 29.246 76.664 0 105.91z" fill="#d01273"/></g></g></g></g></svg>
                  Medicode
                </div>
            </div>
            <div class="flex justify-center font-semibold text-lg p-4 text-black">
                <label for="header">Enter Misconduct</label>
            </div>
            <!-- Name -->
            <div>
                <label for="user_id" class="text-black px-3 font-semibold">Enter User ID</label>

                <input type="text" value="" name="user_id" size="50" class="block mt-1 w-full border-gray-400 text-gray-800" required autofocus>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="test_id" class="text-black px-3 font-semibold">Enter Test ID:</label>

                <input type="text" value="" name="test_id" size="50" class="block mt-1 w-full border-gray-400 text-gray-800" required>
            </div>


            <div class="mt-4">
                <label for="misconduct_desc" class="text-black px-3 font-semibold">Misconduct Description:</label><br>
                <textarea class="mt-1 form-control w-full border-gray-400 text-gray-800" name="misconduct_desc" >
                </textarea>

            </div>





           

            <div class="flex items-center mt-4">
                <x-button class="rounded-lg">
                    {{ __('Submit') }}
                </x-button>
            </div>
        </form>
            <div>
        </div>
</div>
</body>



@endsection
