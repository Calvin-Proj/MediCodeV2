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
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card Revenue-->
            <div class="bg-secondary border-b-4 border-yellow-400 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-yellow-400"><svg class="w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold text-white text-xl  bg-primary p-1">Invigilation Schedule</h5>
                        <h2 class="text-l text-white italic p-2">This button allows the user to view tests and indicate whether he's available for a test. <span class="text-white-500"></span></h2>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card Revenue-->
            <div class="bg-secondary border-b-4 border-yellow-400 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-yellow-400"><svg class="w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold text-white text-xl  bg-primary p-1">Submit Misconduct</h5>
                        <h2 class="text-l text-white italic p-2">This button allows the Invigilator to submit information regarding a student that did misconduct while a test takes place. The lecturer will then view the table and process it externally. <span class="text-white-500"></span></h2>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card Revenue-->
            <div class="bg-secondary border-b-4 border-yellow-400 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-yellow-400"><svg class="w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold text-white text-xl  bg-primary p-1">Submit Hours</h5>
                        <h2 class="text-l text-white italic p-2">This button allows the Invigilator to submit his hours for the tests he invigilated. <span class="text-white-500"></span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</body>

</html>
@endsection
