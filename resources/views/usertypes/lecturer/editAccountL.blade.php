@extends('layouts.app')

@section('content')



<div class="flex justify-center bg-white shadow overflow-hidden border-4 pt-6 m-12 rounded-lg">



            <!-- Validation Errors -->
          

            <form method="POST" action="/lecturer/edit{{auth()->user()->id}}">
                @csrf
                    @if ($errors->any())
                      <div class="alert alert-danger">
                         <ul>
                           @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                            @endforeach
                         </ul>
                       </div>
                   @endif

                  <!-- <img class="block h-14 w-14 justify-center" src="https://cdn3.iconfinder.com/data/icons/avatars-round-flat/33/man4-512.png" alt="avatar">-->

                  <h3></h3>

                <!-- Header -->
                <x-auth-validation-errors class="mb-4 px-2" :errors="$errors" />
                <div class="flex justify-center font-semibold text-lg">
                    <label for="header">Edit Details</label>
                </div>
                <!-- Name -->
                <div>
                    <label for="name" class="text-black px-2 font-semibold">Name</label>

                    <input type="text" value="{{auth()->user()->name}}" name="name" size="50" class="block mt-1 w-full border-gray-400 text-gray-600" required autofocus>
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <label for="email" class="text-black px-2 font-semibold">Email</label>

                    <input type="text" value="{{auth()->user()->email}}" name="email" size="50" class="block mt-1 w-full border-gray-400 text-gray-600" required>
                </div>

                <!--old Password -->
                <div class="mt-4">
                    <label for="Password" class="text-black px-2 font-semibold">Current Password</label>
                    <input type="password" value="HelNat77" name="currentPassword" id="currentPassword" size="50" class="block mt-1 w-full border-gray-400">
                </div>

                 <!--change password checkbox -->

               <x-changePassword/>

                <!-- Confirm Password -->

                <div class="flex items-center mt-4 focus:bg-highlight">
                    <x-button class="rounded-lg">
                        {{ __('Update') }}
                    </x-button>
                </div>
            </form>
                <div>
            </div>
</div>
@endsection
