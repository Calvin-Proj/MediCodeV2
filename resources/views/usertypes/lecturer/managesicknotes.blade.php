@extends('layouts.app')

@section('content')

<div class="container bg-white rounded-lg">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div>
                    <div class="mt-2 mx-2">
                        <!-- modal div -->
                        <!-- Create Sick_Note Model -->
                    </div>
                </div>
            </div>
            <div class="table-responsive px-2">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>File</th>
                            <th>Path</th>
                            <th>Test ID</th>
                            <th>Student Email</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- keeps modal close -->
<div id="CreateSick_NoteModal" style="display:none">
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
                        <strong>Success!</strong>Sick_Note was added successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form-group flex justify-start p-2 text-white">
                        <label for="sick_note_date">Sick_Note Date:</label>
                        <span class="w-14"></span>
                        <input type="date" class="text-primary" name="sick_note_date" id="sick_note_date">
                    </div>
                    <div class="form-group flex justify-start p-2 text-white">
                        <label for="sick_note_time">Sick_Note Time:</label>
                        <span class="w-7"></span>
                        <span class="w-7"></span>
                        <input type="time" class="text-primary" name="sick_note_time" id="sick_note_time">
                    </div>
                    <div class="form-group flex justify-start p-2 text-white">
                        <label for="sick_note_type">Sick_Note Type:</label>
                        <span class="w-16"></span>
                        <select name="sick_note_type" id="sick_note_type" class="text-gray-600 w-32">
                            <option value="Standard Sick_Note">Standard Sick_Note</option>
                            <option value="Sick Sick_Note">Sick Sick_Note</option>
                        </select>
                    </div>
                    <div class="form-group flex justify-start p-2 text-white">
                        <label for="sick_note_desc">Sick_Note Description: </label>
                        <span class="w-3"></span>
                        <textarea class="form-control w-60 text-gray-600" name="sick_note_desc" id="sick_note_desc">
                        </textarea>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer flex flex-wrap justify-end p-4">
                    <button type="button" class="btn btn-success bg-primary rounded-lg text-white p-1.5 text-lg  hover:bg-highlight hover:text-black focus:outline-none" id="SubmitCreateSick_NoteForm">Create</button>
                    <span class="w-2"></span>
                    <button type="button" class="bg-primary rounded-lg text-white p-1.5 text-lg  hover:bg-highlight hover:text-black focus:outline-none" id="hide_create" name="hide_create">Close</button>
                </div>
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
        ajax: '{{ route('get-lectsick') }}',
        columns: [
                {data: 'title', name: 'title'},
                {data: 'path', name: 'path'},
                {data: 'file', name: 'file'},
                {data: 'test_id', name: 'test_id'},
                {data: 'email', name: 'email'},
            ]
    });

    // Create sick_note Ajax request.
    $('#SubmitCreateSick_NoteForm').click(function(e)
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
            url: "{{ route('lectsick.store') }}",
            method: 'post',
            data: {
                    sick_note_date: $('#sick_note_date').val(),
                    sick_note_type: $('#sick_note_type').val(),
                    sick_note_desc: $('#sick_note_desc').val(),
                    sick_note_time: $('#sick_note_time').val(),
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
                                $('#CreateSick_NoteModal').hide();
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
            $( "#CreateSick_NoteModal" ).show();
        });
        $("#hide_create").click(function ()
        {
            $( "#CreateSick_NoteModal" ).hide();
        });
        $("#hide_create1").click(function ()
        {
            $("#CreateSick_NoteModal").hide();
        });
    });
    });
</script>


@endsection
