@extends('layouts.app')

@section('content')

<div class="container bg-white rounded-lg">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div>
                    <div class="mt-2 mx-2">
                        <button class="px-6 py-2 text-white bg-secondary rounded-sm hover:bg-highlight hover:text-primary focus:outline-none" id="show_create" name="show_create">
                            Create Module
                        </button>

                        <!-- modal div -->
                        <!-- Create Module Model -->
                    </div>
                </div>
            </div>
            <div class="table-responsive px-2">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Module Code</th>
                            <th>Module Name</th>
                            <th>Module Year</th>
                            <th class="text-center px-20">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- keeps modal close -->
<div id="CreateModuleModal" style="display:none">
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
                        <strong>Success!</strong>Module was added successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form-group flex justify-start p-2 text-white">
                        <label for="module_code">Module Code:</label>
                        <span class="w-14"></span>
                        <input type="text" class="text-primary" name="module_code" id="module_code">
                    </div>
                    <div class="form-group flex justify-start p-2 text-white">
                        <label for="module_name">Module Name:</label>
                        <span class="w-6"></span>
                        <span class="w-7"></span>
                        <input type="text" class="text-primary" name="module_name" id="module_name">
                    </div>
                    <div class="form-group flex justify-start p-2 text-white">
                        <label for="module_year">Module Year:</label>
                        <span class="w-16"></span>
                        <select name="module_year" id="module_year" class="text-gray-600 w-32">
                            <option value=1>1st Year</option>
                            <option value=2>2nd Year</option>
                            <option value=3>3rd Year</option>
                        </select>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer flex flex-wrap justify-end p-4">
                    <button type="button" class="btn btn-success bg-primary rounded-lg text-white p-1.5 text-lg  hover:bg-highlight hover:text-black focus:outline-none" id="SubmitCreateModuleForm">Create</button>
                    <span class="w-2"></span>
                    <button type="button" class="bg-primary rounded-lg text-white p-1.5 text-lg  hover:bg-highlight hover:text-black focus:outline-none" id="hide_create" name="hide_create">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Module Modal -->
<div id="EditModuleModal" style="display:none">
    <div class="flex absolute top-0 left-0 items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);">
        <div class="h-auto p-4 text-left bg-secondary rounded-lg shadow-xl md:p-4 lg:p-4 border-primary border-2">
            <!-- Modal Header -->
            <div class="flex flex-wrap justify-center">
                <img class="object-contain py-2 w-60" src="{{ asset('img/nmu-logo.png') }}" alt="tag">
            </div>
            <div class="modal-header flex justify-center text-xl text-white p-2">
                <h4 class="modal-title">Edit Module Details</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                    <strong>Success!</strong>Module was edited successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="EditModuleModalBody">

                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer relative flex flex-wrap justify-end p-4">
                <button type="button" class="btn btn-success text-white hover:bg-highlight hover:text-black bg-primary rounded-lg p-1 focus:outline-none" id="SubmitEditModuleForm">Update</button>
                <div class="w-2"></div>
                <button type="button" class="btn btn-danger modelClose text-white hover:bg-highlight hover:text-black bg-primary rounded-lg p-1 focus:outline-none" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Module Modal -->
<div style="display:none" id="DeleteModuleModal">
    <div class="flex absolute top-0 left-0 items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);">
        <div class="h-auto mx-2 text-left bg-secondary rounded-lg shadow-xl md:max-w-xl md:p-1 lg:p-2 md:mx-0 text-white border-primary border-2">
            <!-- Modal Header -->
            <div class="modal-header flex justify-center text-xl">
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <!-- Modal body -->

            <div class="modal-body p-2">
                <h4>Are you sure want to delete this Module?</h4>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer p-2 modal-footer flex flex-wrap justify-center">
                <button type="button" class="btn btn-danger bg-primary rounded-lg px-5 text-lg hover:bg-highlight hover:text-black focus:outline-none" id="SubmitDeleteModuleForm">Yes</button>
                <span class="w-2"></span>
                <button type="button" class="btn btn-default bg-primary rounded-lg px-5 text-lg hover:bg-highlight hover:text-black focus:outline-none" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
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
        ajax: '{{ route('get-admods') }}',
        columns: [
                {data: 'id', name: 'id'},
                {data: 'module_code', name: 'module_code'},
                {data: 'module_name', name: 'module_name'},
                {data: 'module_year', name: 'module_year'},
                {data: 'Actions', name: 'Actions',orderable:false,searchable:false,sClass:'text-center'},
            ]
    });

    // Create module Ajax request.
    $('#SubmitCreateModuleForm').click(function(e)
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
            url: "{{ route('admods.store') }}",
            method: 'post',
            data: {
                module_code: $('#module_code').val(),
                module_name: $('#module_name').val(),
                module_year: $('#module_year').val(),
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
                                $('#CreateModuleModal').hide();
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
            $( "#CreateModuleModal" ).show();
        });
        $("#hide_create").click(function ()
        {
            $( "#CreateModuleModal" ).hide();
        });
        $("#hide_create1").click(function ()
        {
            $("#CreateModuleModal").hide();
        });
    });


    // Get single module in EditModel
    $('.modelClose').on('click', function(){
            $('#EditModuleModal').hide();
        });
        var id;
        $('body').on('click', '#getEditModuleData', function(e) {
            // e.preventDefault();
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            id = $(this).data('id');
            $.ajax({
                url: "/admods/"+id+"/edit",
                method: 'GET',
                // data: {
                //     id: id,
                // },
                success: function(result) {
                    console.log(result);
                    $('#EditModuleModalBody').html(result.html);
                    $('#EditModuleModal').show();
                }
            });
        });

        // Update module Ajax request.
        $('#SubmitEditModuleForm').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admods/"+id,
                method: 'PUT',
                data: {
                    module_code: $('#module_code1').val(),
                    module_name: $('#module_name1').val(),
                    module_year: $('#module_year1').val(),
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
                            $('#EditModuleModal').hide();
                        }, 400);
                    }
                }
            });
        });

        // Delete module Ajax request.
        var deleteID;
        $('body').on('click', '#getDeleteId', function(){
            deleteID = $(this).data('id');
        })
        $('#SubmitDeleteModuleForm').click(function(e) {
            e.preventDefault();
            var id = deleteID;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admods/"+id,
                method: 'DELETE',
                success: function(result) {
                    setInterval(function(){
                        $('.datatable').DataTable().ajax.reload();
                        $('#DeleteModuleModal').hide();
                        location.reload();
                    }, 400);

                }
            });
        });





    });
</script>


@endsection
