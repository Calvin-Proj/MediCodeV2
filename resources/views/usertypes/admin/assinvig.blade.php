@extends('layouts.app')

@section('content')

<div class="container bg-white rounded-lg">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div>
                    <div class="mt-2 mx-2">
                        <!-- modal div -->
                        <!-- Create Invig Model -->
                    </div>
                </div>
            </div>
            <div class="table-responsive px-2">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Test ID</th>
                            <th>Test Date</th>
                            <th>Test Time</th>
                            <th>Module</th>
                            <th>Venue</th>
                            <th class="text-center px-20">Assign</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Edit Invig Modal -->
<div id="EditInvigModal" style="display:none">
    <div class="flex absolute top-0 left-0 items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);">
        <div class="h-auto p-4 text-left bg-secondary rounded-lg shadow-xl md:p-4 lg:p-4 border-primary border-2">
            <!-- Modal Header -->
            <div class="flex flex-wrap justify-center">
                <img class="object-contain py-2 w-60" src="{{ asset('img/nmu-logo.png') }}" alt="tag">
            </div>
            <div class="modal-header flex justify-center text-xl text-white p-2">
                <h4 class="modal-title">Edit Invig Details</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                    <strong>Success!</strong>Invig was edited successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="EditInvigModalBody">

                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer relative flex flex-wrap justify-end p-4">
                <button type="button" class="btn btn-success text-white hover:bg-highlight hover:text-black bg-primary rounded-lg p-1 focus:outline-none" id="SubmitEditInvigForm">Update</button>
                <div class="w-2"></div>
                <button type="button" class="btn btn-danger modelClose text-white hover:bg-highlight hover:text-black bg-primary rounded-lg p-1 focus:outline-none" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Delete Invig Modal -->
<div style="display:none" id="DeleteInvigModal">
    <div class="flex absolute top-0 left-0 items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);">
        <div class="h-auto mx-2 text-left bg-secondary rounded-lg shadow-xl md:max-w-xl md:p-1 lg:p-2 md:mx-0 text-white border-primary border-2">
            <!-- Modal Header -->
            <div class="modal-header flex justify-center text-xl">
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <!-- Modal body -->

            <div class="modal-body p-2">
                <h4>Are you sure want to delete this Invig?</h4>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer p-2 modal-footer flex flex-wrap justify-center">
                <button type="button" class="btn btn-danger bg-primary rounded-lg px-5 text-lg hover:bg-highlight hover:text-black focus:outline-none" id="SubmitDeleteInvigForm">Yes</button>
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

<script type="text/javascript">
    $(document).ready(function() {
        // init datatable.
        var dataTable = $('.datatable').DataTable(
        {
        processing: true,
        serverSide: true,
        autoWidth: false,
        pageLength: 5,
        // scrollX: true,
        "order": [[ 0, "desc" ]],
        ajax: '{{ route('get-assinvig') }}',
        columns: [
                {data: 'id', name: 'id'},
                {data: 'test_date', name: 'test_date'},
                {data: 'test_time', name: 'test_time'},
                {data: 'module_name', name: 'module_name'},
                {data: 'venue_name', name: 'venue_name'},
                {data: 'Actions', name: 'Actions',orderable:false,searchable:false,sClass:'text-center'},
            ]
    });

    // Get single module in EditModel
    $('.modelClose').on('click', function(){
            $('#EditInvigModal').hide();
        });
        var id;
        $('body').on('click', '#getEditInvigData', function(e) {
            // e.preventDefault();
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            id = $(this).data('id');
            $.ajax({
                url: "/adinvig/"+id+"/edit",
                method: 'GET',
                // data: {
                //     id: id,
                // },
                success: function(result) {
                    console.log(result);
                    $('#EditInvigModalBody').html(result.html);
                    $('#EditInvigModal').show();
                }
            });
        });

        // Update invig Ajax request.
        $('#SubmitEditInvigForm').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/adinvig/"+id,
                method: 'PUT',
                data: {
                    name: $('#invig_name1').val(),
                    email: $('#invig_email1').val(),
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
                            $('#EditInvigModal').hide();
                        }, 400);
                    }
                }
            });
        });

        // Delete invig Ajax request.
        var deleteID;
        $('body').on('click', '#getDeleteId', function(){
            deleteID = $(this).data('id');
        })
        $('#SubmitDeleteInvigForm').click(function(e) {
            e.preventDefault();
            var id = deleteID;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/adinvig/"+id,
                method: 'DELETE',
                success: function(result) {
                    setInterval(function(){
                        $('.datatable').DataTable().ajax.reload();
                        $('#DeleteInvigModal').hide();
                        location.reload();
                    }, 400);

                }
            });
        });





    });
</script>


@endsection
