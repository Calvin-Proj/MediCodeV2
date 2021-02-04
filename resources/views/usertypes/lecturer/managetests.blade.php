@extends('layouts.app')

@section('content')

<div class="container bg-white rounded-lg">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div>
                    <div class="mt-2 mx-2">
                        <button class="px-6 py-2 text-white bg-secondary rounded-sm hover:bg-highlight hover:text-primary focus:outline-none" id="show_create" name="show_create">
                            Create Test
                        </button>
                        <!-- modal div -->
                        <!-- Create Test Model -->
                    </div>
                </div>
            </div>
            <div class="table-responsive px-2">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Test Date</th>
                            <th>Test Time</th>
                            <th>Test Type</th>
                            <th>Test Description</th>
                            <th>Venue Name</th>
                            <th>Module Name</th>
                            <th class="text-center px-20">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- keeps modal close -->
<div id="CreateTestModal" style="display:none">
    <div class="flex absolute top-0 left-0 items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);">
        <div class="h-auto p-4 text-left bg-secondary rounded-lg shadow-xl md:p-4 lg:p-4 border-primary border-2">
            <div>
                <!-- Model Header -->
                <div class="modal-header">
                    <div class="flex flex-wrap justify-center">
                        <img class="object-contain py-2 w-60" src="{{ asset('img/nmu-logo.png') }}" alt="tag">
                    </div>
                    <div class="flex justify-center text-xl text-white">
                        <h4 class="">Fill In Details</h4>
                    </div>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                        <strong>Success!</strong>Test was added successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form-group flex justify-start p-2 text-white">
                        <label for="test_date">Test Date:</label>
                        <span class="w-14"></span>
                        <input type="date" class="text-primary" name="test_date" id="test_date">
                    </div>
                    <div class="form-group flex justify-start p-2 text-white">
                        <label for="test_time">Test Time:</label>
                        <span class="w-7"></span>
                        <span class="w-7"></span>
                        <input type="time" class="text-primary" name="test_time" id="test_time">
                    </div>
                    <div class="form-group flex justify-start p-2 text-white">
                        <label for="test_type">Test Type:</label>
                        <span class="w-8"></span>
                        <span class="w-7"></span>
                        <select name="test_type" id="test_type" class="text-gray-600 w-32">
                            <option value="Standard Test">Standard Test</option>
                            <option value="Sick Test">Sick Test</option>
                        </select>
                    </div>
                    <div class="form-group flex justify-start p-2 text-white">
                        <label for="test_desc">Test Description: </label>
                        <span class="w-3"></span>
                        <textarea class="form-control w-60 text-gray-600" name="test_desc" id="test_desc">
                        </textarea>
                    </div>
                    <div class="form-group flex justify-start p-2 text-white">
                        <label for="test_type">Test Venue:</label>
                        <span class="w-6"></span>
                        <span class="w-6"></span>
                        <select name="venue_id" id="venue_id" class="text-gray-600 w-32">
                            <option value="1">Heinz Betz</option>
                            <option value="2">Eng 03</option>
                        </select>
                    </div>
                    <div class="form-group flex justify-start p-2 text-white">
                        <label for="test_type">Module:</label>
                        <span class="w-9"></span>
                        <span class="w-8"></span>
                        <select name="module_id" id="module_id" class="text-gray-600 w-32">
                            <option value="1">ONT3660</option>
                            <option value="2">WITH3666</option>
                        </select>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer flex flex-wrap justify-end p-4">
                    <button type="button" class="btn btn-success bg-primary rounded-lg text-white p-1.5 text-lg  hover:bg-highlight hover:text-black focus:outline-none" id="SubmitCreateTestForm">Create</button>
                    <span class="w-2"></span>
                    <button type="button" class="bg-primary rounded-lg text-white p-1.5 text-lg  hover:bg-highlight hover:text-black focus:outline-none" id="hide_create" name="hide_create">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Edit Test Modal -->
<div id="EditTestModal" style="display:none">
    <div class="flex absolute top-0 left-0 items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);">
        <div class="h-auto p-4 text-left bg-secondary rounded-lg shadow-xl md:p-4 lg:p-4 border-primary border-2">
            <!-- Modal Header -->
            <div class="flex flex-wrap justify-center">
                <img class="object-contain py-2 w-60" src="{{ asset('img/nmu-logo.png') }}" alt="tag">
            </div>
            <div class="modal-header flex justify-center text-xl text-white p-2">
                <h4 class="modal-title">Edit Test Details</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                    <strong>Success!</strong>Test was edited successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="EditTestModalBody">

                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer relative flex flex-wrap justify-end p-4">
                <button type="button" class="btn btn-success text-white hover:bg-highlight hover:text-black bg-primary rounded-lg p-1 focus:outline-none" id="SubmitEditTestForm">Update</button>
                <div class="w-2"></div>
                <button type="button" class="btn btn-danger modelClose text-white hover:bg-highlight hover:text-black bg-primary rounded-lg p-1 focus:outline-none" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Test Modal -->
<div style="display:none" id="DeleteTestModal">
    <div class="flex absolute top-0 left-0 items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);">
        <div class="h-auto mx-2 text-left bg-secondary rounded-lg shadow-xl md:max-w-xl md:p-1 lg:p-2 md:mx-0 text-white border-primary border-2">
            <!-- Modal Header -->
            <div class="modal-header flex justify-center text-xl">
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <!-- Modal body -->

            <div class="modal-body p-2">
                <h4>Are you sure want to delete this test?</h4>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer p-2 modal-footer flex flex-wrap justify-center">
                <button type="button" class="btn btn-danger bg-primary rounded-lg px-5 text-lg hover:bg-highlight hover:text-black focus:outline-none" id="SubmitDeleteTestForm">Yes</button>
                <span class="w-2"></span>
                <button type="button" class="btn btn-default bg-primary rounded-lg px-5 text-lg hover:bg-highlight hover:text-black focus:outline-none" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // init datatable.
        var dataTable = $('.datatable').DataTable(
        {
        dom: 'Bfrtip',
        buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
        ] ,
        processing: true,
        serverSide: true,
        autoWidth: false,
        pageLength: 5,
        // scrollX: true,
        "order": [[ 0, "desc" ]],
        ajax: '{{ route('get-lecttests') }}',
        columns: [
                {data: 'test_date', name: 'test_date'},
                {data: 'test_time', name: 'test_time'},
                {data: 'test_type', name: 'test_type'},
                {data: 'test_desc', name: 'test_desc'},
                {data: 'venue_name', name: 'venue_name'},
                {data: 'module_name', name: 'module_name'},
                {data: 'Actions', name: 'Actions',orderable:false,searchable:false,sClass:'text-center'},
            ]
    });

    // Create test Ajax request.
    $('#SubmitCreateTestForm').click(function(e)
    {
        e.preventDefault();
        $.ajaxSetup(
            {
            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax(
            {
            url: "{{ route('lecttests.store') }}",
            method: 'post',
            data: {
                    test_date: $('#test_date').val(),
                    test_time: $('#test_time').val(),
                    test_type: $('#test_type').val(),
                    test_desc: $('#test_desc').val(),
                    venue_id: $('#venue_id').val(),
                    module_id: $('#module_id').val(),
                },
            success: function(result)
            {
                if(result.errors)
                {
                    $('.alert-danger').html('');
                    $.each(result.errors, function(key, value)
                        {
                        $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                        });
                } else
                {
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.datatable').DataTable().ajax.reload();
                            setTimeout(function()
                            {
                                $('.alert-success').hide();
                                $('#CreateTestModal').hide();
                            }, 500);
                }
            }
        });
    });

    //buttons for create
    $(document).ready(function()
    {
        $("#show_create").click(function ()
        {
            $( "#CreateTestModal" ).show();
        });
        $("#hide_create").click(function ()
        {
            $( "#CreateTestModal" ).hide();
        });
        $("#hide_create1").click(function ()
        {
            $("#CreateTestModal").hide();
        });
    });


    // Get single test in EditModel
    $('.modelClose').on('click', function(){
            $('#EditTestModal').hide();
        });
        var id;
        $('body').on('click', '#getEditTestData', function(e) {
            // e.preventDefault();
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            id = $(this).data('id');
            $.ajax({
                url: "/lecttests/"+id+"/edit",
                method: 'GET',
                // data: {
                //     id: id,
                // },
                success: function(result) {
                    console.log(result);
                    $('#EditTestModalBody').html(result.html);
                    $('#EditTestModal').show();
                }
            });
        });

        // Update test Ajax request.
        $('#SubmitEditTestForm').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/lecttests/"+id,
                method: 'PUT',
                data: {
                    test_date: $('#test_date1').val(),
                    test_time: $('#test_time1').val(),
                    test_type: $('#test_type1').val(),
                    test_desc: $('#test_desc1').val(),
                    venue_id: $('#venue_id1').val(),
                    module_id: $('#module_id1').val(),
                },
                success: function(result) {
                    if(result.errors) {
                        $('.alert-danger').html('');
                        $.each(result.errors, function(key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                        });
                    } else {
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.datatable').DataTable().ajax.reload();
                        setTimeout(function(){
                            $('.alert-success').hide();
                            $('#EditTestModal').hide();
                        }, 400);
                    }
                }
            });
        });

        // Delete test Ajax request.
        var deleteID;
        $('body').on('click', '#getDeleteId', function(){
            deleteID = $(this).data('id');
        })
        $('#SubmitDeleteTestForm').click(function(e) {
            e.preventDefault();
            var id = deleteID;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/lecttests/"+id,
                method: 'DELETE',
                success: function(result) {
                    setInterval(function(){
                        $('.datatable').DataTable().ajax.reload();
                        $('#DeleteTestModal').hide();
                        location.reload();
                    }, 400);

                }
            });
        });
    });
</script>


@endsection
