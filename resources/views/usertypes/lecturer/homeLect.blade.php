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
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card Revenue-->
                    <div class="bg-secondary border-b-4 border-yellow-400 rounded-lg shadow-xl p-5 ">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-yellow-400"><i class="fas fa-pencil-alt fa-3x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-white">tests created</h5>
                                <h3 class="font-bold text-3xl text-white">{{$count_test_created}} <span class="text-white-500"><i class="fas fa-caret-up"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card Revenue-->
                    <div class="bg-secondary border-b-4 border-yellow-400 rounded-lg shadow-xl p-5 ">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-yellow-400"><i class="fas fa-user-graduate fa-3x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-white">Students</h5>
                                <h3 class="font-bold text-3xl text-white">{{$lect_studs_count}} <span class="text-white-500"><i class="fas fa-caret-up"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card Revenue-->
                    <div class="bg-secondary border-b-4 border-yellow-400 rounded-lg shadow-xl p-5 ">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-yellow-400"><i class="fas fa-band-aid	fa-3x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-white">Sick tests created</h5>
                                <h3 class="font-bold text-3xl text-white">{{$count_stest_created}} <span class="text-white-500"><i class="fas fa-caret-up"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card Revenue-->
                    <div class="bg-secondary border-b-4 border-green-400 rounded-lg shadow-xl p-5 ">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-green-400"><i class="fas fa-check fa-3x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-white">Tests Completed</h5>
                                <h3 class="font-bold text-3xl text-white">{{$count_test_created_comp}} <span class="text-white-500"><i class="fas fa-caret-up"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card Revenue-->
                    <div class="bg-secondary border-b-4 border-yellow-400 rounded-lg shadow-xl p-5 ">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-yellow-400"><i class="fas fa-book fa-3x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-white">modules</h5>
                                <h3 class="font-bold text-3xl text-white">1 <span class="text-white-500"><i class="fas fa-caret-up"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card Revenue-->
                    <div class="bg-secondary border-b-4 border-green-400 rounded-lg shadow-xl p-5 ">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-green-400"><i class="fas fa-check fa-3x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-white">sick tests completed</h5>
                                <h3 class="font-bold text-3xl text-white">{{$count_stest_created_comp}} <span class="text-white-500"><i class="fas fa-caret-up"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>

              </div>


             <div class="flex flex-row flex-wrap flex-grow mt-2">

                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Table Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-xl">
                        <div class="bg-yellow-400 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-black">Upcoming Tests</h5>
                        </div>
                        <div class="p-5">
                            <table class="w-full p-5 text-gray-700 table-auto" >
                                <thead>
                                    <tr>
                                        <th class="text-left text-blue-900">Test ID</th>
                                        <th class="text-left text-blue-900">Date</th>

                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($tests_upcoming as $test_upcoming)
                                    <tr>
                                        <td>{{$test_upcoming->id}}</td>
                                        <td>{{$test_upcoming->test_date}}</td>

                                    </tr>
                                    
                                    @endforeach
                                </tbody>
                            </table>



                        </div>
                     </div>
                      <!--/table Card-->


                  </div>
                 <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                     <!--Table Card-->
                     <div class="bg-white border-transparent rounded-lg shadow-xl">
                         <div class="bg-yellow-400 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                             <h5 class="font-bold uppercase text-black">Module</h5>
                         </div>
                         <div class="p-5">
                             <table class="w-full p-5 text-gray-700">
                                 <thead>
                                 <tr>
                                     <th class="text-left text-blue-900">Module Code</th>
                                     <th class="text-left text-blue-900">Module Name</th>
                                     <th class="text-left text-blue-900">Year</th>
                                 </tr>
                                 </thead>

                                 <tbody>

                                 <tr>
                                    @if($module=='')
                                        <td>Module Pending</td>
                                        <td></td>
                                        <td></td>



                                    @else
                                    <td>{{$module->module_code}}</td>
                                    <td>{{$module->module_name}}</td>
                                    <td>{{$module->module_year}}</td>
                                    

                                    @endif

                                 </tr>

                                 </tbody>
                             </table>



                         </div>
                     </div>
                     <!--/table Card-->


                 </div>


                <div class="w-full md:w-1/2 xl:w-1/3 p-6">

                    <div class="bg-white rounded-lg shadow-xl p-5 ">

                        <x-date-time/>

                    </div>

                </div>


            </div>
        </div>
    </div>







</body>

</html>
@endsection
