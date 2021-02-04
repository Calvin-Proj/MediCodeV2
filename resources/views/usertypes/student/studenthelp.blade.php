@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="en">

<head>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet"> <!--Replace with your tailwind.css once created-->
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

</head>


<body class="bg-primary leading-normal tracking-normal mt-12">



<div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5 rounded-lg">

    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 xl:w-1/2 p-6">
            <!--Metric Card Revenue-->
            <div class="bg-secondary border-b-4 border-yellow-400 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-yellow-400"><svg class="h-10 w-10 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M9 4.8A7.97 7.97 0 005.5 4c-1.25 0-2.44.29-3.5.8v10a7.97 7.97 0 013.5-.8c1.67 0 3.22.51 4.5 1.39A7.96 7.96 0 0114.5 14c1.25 0 2.44.29 3.5.8v-10a7.97 7.97 0 00-3.5-.8c-1.25 0-2.44.29-3.5.8V12a1 1 0 11-2 0V4.8z"/>
                        </svg>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold text-white text-xl  bg-primary p-1">View Test Schedule</h5>
                        <h2 class="text-l text-white italic p-2">This button allows the Student to view tests available for him and view detailed information regarding the test. When clicking the view button, the Student will be able to see a map box, details of the test and his seating plan. <span class="text-white-500"></span></h2>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/2 p-6">
            <!--Metric Card Revenue-->
            <div class="bg-secondary border-b-4 border-yellow-400 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-yellow-400"><svg class="h-10 w-10 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-8 8a1 1 0 01-1.4 0l-4-4a1 1 0 011.4-1.4L8 12.58l7.3-7.3a1 1 0 011.4 0z" clip-rule="evenodd"/></svg>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold text-white text-xl  bg-primary p-1">Book Sick Test</h5>
                        <h2 class="text-l text-white italic p-2">This button allows the Student to view available sick tests and book them. He is required to attach a doctors note when making a booking, or else he won't be eligible to write. <span class="text-white-500"></span></h2>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
    </div>
</div>
</body>

</html>
@endsection
