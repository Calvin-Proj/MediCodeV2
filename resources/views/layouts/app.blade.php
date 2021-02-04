<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ url('/css/datatable.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!--Stylesheets-->
    <!--Replace with your tailwind.css once created-->

    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <!--Button Extension Datatables CSS-->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.css' rel='stylesheet' />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css"/>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNNBeMyneLT_Vzd26QqR-A1QYbZAnNT1M&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <title>NMU Test Schedular</title>
    </head>
    <body class="bg-primary">
        <nav class=" bg-secondary text-white flex justify-between mb-5 h-14">
            <ul class="flex items-center">
                <li>
                    <!--home/dashboard button-->
                       <x-home-button/>
                </li>
                <!--usertype navbar connection-->
                            @switch(auth()->user()->usertype)
                                @case('admin')
                                            <x-admin-manage-mod-btn/>
                                            <x-admin-manage-venue-btn/>
                                            <x-admin-manage-lect-btn/>
                                            <x-admin-manage-invigilator-btn/>
                                            <x-admin-assign-invigilator-btn/>
                                            <x-admin-manage-students-btn/>
                                    @break
                                @case('lecturer')
                                            <x-lect-manage-test-btn/>
                                            <x-lect-manage-notes-btn/>
                                            <x-lect-view-miscon-btn/>



                                    @break
                                @case('invig')
                                            <x-invig-schedule-btn/>
                                            <x-invig-submit-miscon-btn/>
                                    @break
                                @case('student')
                                            <x-stud-view-test-sched-btn/>
                                            <x-stud-book-sick-btn/>
                                    @break
                                @default
                            @endswitch
                            <span class="w-8"></span>
                            <li>
                                <img class="object-contain py-1.5 w-36" src="{{ asset('img/nmu-logo.png') }}" alt="tag">
                            </li>
                    </li>
                </ul>
            <!--tooltips navbar connection-->
            @switch(auth()->user()->usertype)
                @case('admin')
                        <x-admin-help-btn/>
                    @break
                @case('lecturer')
                        <x-lect-help-btn/>
                     @break
                @case('invig')
                        <x-invig-help-btn/>
                    @break
                @case('student')
                        <x-stud-help-btn/>
                    @break
                @default
            @endswitch
            <ul class= "flex items-center">
                @auth
                    <li>
                       <x-dropdown-menu/>
                    </li>
                @endauth
            </ul>
        </nav>
 <!--banner to confirm update-->
         @if(session()->has('updated'))
          <x-updated-account-alert/>
          @endif


        <main class="px-4 py-2 flex justify-center min-w-full">
            @yield('content')
        </main>
        @yield('script')
    </body>


</html>
