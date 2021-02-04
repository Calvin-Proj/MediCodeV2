<x-guest-layout>
    <div class="bg-secondary w-full">
        <nav id="header" class="fixed w-full z-30 top-0 text-white bg-secondary">
            <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
              <div class="pl-4 flex items-center">
                <div class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
                  <svg class="h-8 fill-current inline" id="Layer_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="60" xmlns="http://www.w3.org/2000/svg"><g><g id="XMLID_277_"><g id="XMLID_278_"><g id="XMLID_281_"><g id="XMLID_282_"><g id="XMLID_283_"><g id="XMLID_284_"><g id="XMLID_285_"><g id="XMLID_286_"><g id="XMLID_287_"><g id="XMLID_288_"><g id="XMLID_289_"><g id="XMLID_290_"><g id="XMLID_291_"><g id="XMLID_292_"><circle id="XMLID_293_" cx="256" cy="256" fill="#08475e" r="256"/></g></g></g></g></g></g></g></g></g></g></g></g></g></g><path d="m511.276 275.338c-48.783-48.783-207.288-207.288-207.288-207.288l-235.938 235.938 207.288 207.288c125.967-9.409 226.53-109.971 235.938-235.938z" fill="#05303d"/><g><g><path d="m237.253 236.546-102.265-102.265.314-3.457 62.774-62.774c29.247-29.247 76.665-29.247 105.912 0 29.247 29.247 29.247 76.665 0 105.912l-62.774 62.774z" fill="#fff"/><g><path d="m303.984 173.961-62.77 62.77-3.96-.184-50.883-50.883 117.613-117.613c14.623 14.623 21.934 33.785 21.934 52.948.001 19.177-7.311 38.339-21.934 52.962z" fill="#d1fefb"/></g><path d="m68.05 303.988c-29.247-29.247-29.247-76.665 0-105.912l67.252-67.252 105.912 105.912-67.252 67.252c-29.247 29.247-76.665 29.247-105.912 0z" fill="#45f6ff"/><path d="m241.214 236.731-67.253 67.253c-29.246 29.246-76.664 29.246-105.91 0l120.208-120.208z" fill="#5ecbf1"/></g><g><path d="m274.747 275.454 102.265 102.265-.314 3.457-62.774 62.774c-29.247 29.247-76.665 29.247-105.912 0-29.247-29.247-29.247-76.665 0-105.912l62.774-62.774z" fill="#fff"/><path d="m376.696 381.179-62.77 62.77c-29.246 29.246-76.664 29.246-105.91 0l117.613-117.613 51.385 51.385z" fill="#d1fefb"/><path d="m443.95 208.012c29.247 29.247 29.247 76.665 0 105.912l-67.252 67.252-105.912-105.912 67.252-67.252c29.247-29.247 76.665-29.247 105.912 0z" fill="#ff405c"/><g><path d="m443.949 313.926-67.253 67.253-52.955-52.955 120.208-120.208c29.246 29.246 29.246 76.664 0 105.91z" fill="#d01273"/></g></g></g></g></svg>
                  Medicode
                </div>
              </div>
              <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
                <ul class="list-reset lg:flex justify-end flex-1 items-center text-white">
                  <li class="mr-3 list-disc">
                    Fast & efficient scheduling system.
                  </li>
                  <span class="w-4">
                  </span>
                  <li class="mr-3 list-disc">
                    Facilitates all different types of users.
                  </li>
                </ul>

                <button
                  id="ViewMore"
                  class="mx-auto lg:mx-0 hover:bg-highlight hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
                >
                <a href="{{ route('landingpage') }}">
                  View More
                </a>
                </button>
              </div>
            </div>
            <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
          </nav>
    </div>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo/>
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>


            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-secondary shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-200">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="flex justify-center mt-4">
                <x-button class="">
                    {{ __('Login') }}
                </x-button>
            </div>
                <div class="flex justify-center items-center mt-4 py-2">
                    @if (Route::has('password.request'))
                        <a class="flex px-8 underline text-sm text-white hover:text-gray-200" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                <!--to register page-->
                    <a class="flex px-8 underline text-sm text-white hover:text-gray-200" href="{{ route('register') }}">
                        {{__('Sign Up') }}
                    </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
