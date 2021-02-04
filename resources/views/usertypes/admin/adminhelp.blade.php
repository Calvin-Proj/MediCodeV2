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



<div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 xl:w-1/2 p-6">
            <!--Metric Card Revenue-->
            <div class="bg-secondary border-b-4 border-yellow-400 rounded-lg shadow-xl p-6">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-yellow-400"><svg class="w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/></svg></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold text-white text-xl bg-primary p-1">Manage Modules</h5>
                        <h2 class="text-l text-white italic p-2">This button allows the user to add, change or delete any module in the system. <span class="text-white-500"></span></h2>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/2 p-6">
            <!--Metric Card Revenue-->
            <div class="bg-secondary border-b-4 border-yellow-400 rounded-lg shadow-xl p-6">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-yellow-400"><svg class="w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"/></svg></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold text-white text-xl bg-primary p-1">Manage Venues</h5>
                        <h2 class="text-l text-white italic p-2">This button allows the user to add, change or delete any venue in the system. <span class="text-white-500"></span></h2>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/2 p-6">
            <!--Metric Card Revenue-->
            <div class="bg-secondary border-b-4 border-yellow-400 rounded-lg shadow-xl p-6">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-yellow-400"><svg class="w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zm5 2a2 2 0 11-4 0 2 2 0 014 0zm-4 7a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zm10 10v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/></svg></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold text-white text-xl bg-primary p-1">Manage Lecturers</h5>
                        <h2 class="text-l text-white italic p-2">This button allows the user to add, change or delete any lecturer in the system. <span class="text-white-500"></span></h2>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/2 p-6">
            <!--Metric Card Revenue-->
            <div class="bg-secondary border-b-4 border-yellow-400 rounded-lg shadow-xl p-4">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-yellow-400"><svg class="w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold text-white text-xl bg-primary p-1">Manage Invigilator</h5>
                        <h2 class="text-l text-white italic p-2">This button allows the user to add, change or delete any invigilator in the system. The user can also assign a lecturer to a specific test if he indicated availability. <span class="text-white-500"></span></h2>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/2 p-6">
            <!--Metric Card Revenue-->
            <div class="bg-secondary border-b-4 border-yellow-400 rounded-lg shadow-xl p-6">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-yellow-400"><svg class="w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/></svg>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold text-white text-xl bg-primary p-1">Manage Students</h5>
                        <h2 class="text-l text-white italic p-2">This button allows the user to add, change or delete any student in the system. <span class="text-white-500"></span></h2>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
            <!--/Metric Card-->
    </div>

</div>
</body>

</html>
@endsection
