@extends('layouts.app')

@section('content')

<div class="container bg-white rounded-lg">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div>
                    <div class="mt-2 mx-2">
                        <button class="px-6 py-2 text-white bg-secondary rounded-sm hover:bg-highlight hover:text-primary focus:outline-none" id="show_create" name="show_create">
                            Create Venue
                        </button>
                        <!-- modal div -->
                        <!-- Create Venue Model -->
                    </div>
                </div>
            </div>
            <div class="table-responsive px-2">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Number of Seats</th>
                            <th>Venue Name</th>
                            <th>Building Name</th>
                            <th class="text-center px-20">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- keeps modal close -->
<div id="CreateVenueModal" style="display:none">
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
                        <strong>Success!</strong>Venue was added successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form-group flex justify-start p-2 text-white">
                        <label for="no_of_seats">Number of Seats:</label>
                        <span class="w-14"></span>
                        <input type="text" class="text-primary" name="no_of_seats" id="no_of_seats">
                    </div>
                    <div class="form-group flex justify-start p-2 text-white">
                        <label for="venue_name">Venue Name:</label>
                        <span class="w-11"></span>
                        <span class="w-10"></span>
                        <input type="text" class="text-primary" name="venue_name" id="venue_name">
                    </div>
                    <div class="form-group flex justify-start p-2 text-white">
                    <label for="building_id">Building Name:</label>
                    <span class="w-9"></span>
                    <span class="w-9"></span>
                    <select name="building_id" id="building_id" class="text-gray-600 w-32">
                        <option value="1">Heinz Betz</option>
                        <option value="2">Engineering</option>
                        <option value="3">ICT</option>
                    </select>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer flex flex-wrap justify-end p-4">
                    <button type="button" class="btn btn-success bg-primary rounded-lg text-white p-1.5 text-lg  hover:bg-highlight hover:text-black focus:outline-none" id="SubmitCreateVenueForm">Create</button>
                    <span class="w-2"></span>
                    <button type="button" class="bg-primary rounded-lg text-white p-1.5 text-lg  hover:bg-highlight hover:text-black focus:outline-none" id="hide_create" name="hide_create">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Edit Venue Modal -->
<div id="EditVenueModal" style="display:none">
    <div class="flex absolute top-0 left-0 items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);">
        <div class="h-auto p-4 text-left bg-secondary rounded-lg shadow-xl md:p-4 lg:p-4 border-primary border-2">
            <!-- Modal Header -->
            <div class="flex flex-wrap justify-center">
                <img class="object-contain py-2 w-60" src="{{ asset('img/nmu-logo.png') }}" alt="tag">
            </div>
            <div class="modal-header flex justify-center text-xl text-white p-2">
                <h4 class="modal-title">Edit Venue Details</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                    <strong>Success!</strong>Venue was edited successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="EditVenueModalBody">

                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer relative flex flex-wrap justify-end p-4">
                <button type="button" class="btn btn-success text-white hover:bg-highlight hover:text-black bg-primary rounded-lg p-1 focus:outline-none" id="SubmitEditVenueForm">Update</button>
                <div class="w-2"></div>
                <button type="button" class="btn btn-danger modelClose text-white hover:bg-highlight hover:text-black bg-primary rounded-lg p-1 focus:outline-none" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Venue Modal -->
<div style="display:none" id="DeleteVenueModal">
    <div class="flex absolute top-0 left-0 items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);">
        <div class="h-auto mx-2 text-left bg-secondary rounded-lg shadow-xl md:max-w-xl md:p-1 lg:p-2 md:mx-0 text-white border-primary border-2">
            <!-- Modal Header -->
            <div class="modal-header flex justify-center text-xl">
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <!-- Modal body -->

            <div class="modal-body p-2">
                <h4>Are you sure want to delete this Venue?</h4>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer p-2 modal-footer flex flex-wrap justify-center">
                <button type="button" class="btn btn-danger bg-primary rounded-lg px-5 text-lg hover:bg-highlight hover:text-black focus:outline-none" id="SubmitDeleteVenueForm">Yes</button>
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
        ajax: '{{ route('get-advenues') }}',
        columns: [
                {data: 'id', name: 'id'},
                {data: 'no_of_seats', name: 'no_of_seats'},
                {data: 'venue_name', name: 'venue_name'},
                {data: 'building_name', name: 'building_name'},
                {data: 'Actions', name: 'Actions',orderable:false,searchable:false,sClass:'text-center'},
            ]
    });

    // Create venue Ajax request.
    $('#SubmitCreateVenueForm').click(function(e)
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
            url: "{{ route('advenues.store') }}",
            method: 'post',
            data: {
                no_of_seats: $('#no_of_seats').val(),
                venue_name: $('#venue_name').val(),
                building_id: $('#building_id').val(),
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
                                $('#CreateVenueModal').hide();
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
            $( "#CreateVenueModal" ).show();
        });
        $("#hide_create").click(function ()
        {
            $( "#CreateVenueModal" ).hide();
        });
        $("#hide_create1").click(function ()
        {
            $("#CreateVenueModal").hide();
        });
    });


    // Get single venue in EditModel
    $('.modelClose').on('click', function(){
            $('#EditVenueModal').hide();
        });
        var id;
        $('body').on('click', '#getEditVenueData', function(e) {
            // e.preventDefault();
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            id = $(this).data('id');
            $.ajax({
                url: "/advenues/"+id+"/edit",
                method: 'GET',
                // data: {
                //     id: id,
                // },
                success: function(result) {
                    console.log(result);
                    $('#EditVenueModalBody').html(result.html);
                    $('#EditVenueModal').show();
                }
            });
        });

        // Update venue Ajax request.
        $('#SubmitEditVenueForm').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/advenues/"+id,
                method: 'PUT',
                data: {
                    no_of_seats: $('#no_of_seats1').val(),
                    venue_name: $('#venue_name1').val(),
                    building_id: $('#building_id1').val(),
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
                            $('#EditVenueModal').hide();
                        }, 400);
                    }
                }
            });
        });

        // Delete venue Ajax request.
        var deleteID;
        $('body').on('click', '#getDeleteId', function(){
            deleteID = $(this).data('id');
        })
        $('#SubmitDeleteVenueForm').click(function(e) {
            e.preventDefault();
            var id = deleteID;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/advenues/"+id,
                method: 'DELETE',
                success: function(result) {
                    setInterval(function(){
                        $('.datatable').DataTable().ajax.reload();
                        $('#DeleteVenueModal').hide();
                        location.reload();
                    }, 400);

                }
            });
        });
    });
</script>


@endsection
