@extends('layouts.app')

@section('content')
<div class="container bg-white rounded-lg">
  <x-auth-validation-errors class="mb-4" :errors="$errors" />
    @if (\Session::has('error'))
<div class="alert alert-success w-full bg-red-500 text-white rounded-sm" name="error" id="error">
    <ul>
        <li>{!! \Session::get('error') !!}</li>
    </ul>
</div>
@endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div>
                    <div class="mt-2 mx-2">
                      <button class="px-4 py-2 text-white bg-secondary rounded-sm fo font-semibold hover:bg-highlight hover:text-primary focus:outline-none" type="button" onclick="toggleModal(`modal-id`)">Book</button>
                    </div>
                </div>
            </div>
            <div id="sick_note_user_id" name="sick_note_user_id" value="{{ auth()->user()->id }}"></div>
            <div class="table-responsive px-2">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Test Date</th>
                            <th>Test Type</th>
                            <th>Test Description</th>
                            <th>Test Time</th>
                            <th>Module Name</th>
                            <th>Venue Name</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!--modal-->
<!--modal-->

<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
  <form action="{{ route('fileUpload') }}" method="POST" enctype="multipart/form-data" >
    @csrf


    <div class="relative mx-auto max-w-7xl h-3/12 w-full py-16">
      <!--content-->
      <div class="border-0 rounded-lg shadow-lg relative flex flex-col bg-white outline-none focus:outline-none w-full h-full">
        <!--header-->
        <div class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t">
          <h3 class="text-3xl font-semibold">
            Upload Sick Note
          </h3>
        </div>

        <!--body- upload note-->
        <div class="form-group form-control p-5">
          <label  for="title">Title</label><br>
          <input type="text"  name="title"> <br><br>
          <label  for="test_id">Test ID</label><br>
          <input type="text"  name="test_id"> <br>
          </div>

        <div class="form-group">
        <input type="file" class="form-control-file p-5" name="file" id="fileUpload">
        </div>
        <!--footer-->
        <div class="flex items-center p-5 border-t border-solid border-gray-300 rounded-b">
          <button class="text-red-500 background-transparent font-bold uppercase  py-2 text-sm outline-none focus:outline-none mr-1 mb-1" type="button" style="transition: all .15s ease" onclick="toggleModal('modal-id')">
            Close
          </button>
          <button class="bg-green-500 text-white active:bg-green-600 ml-5 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1">
            Submit
          </button>
        </div>
      </div>
    </div>
  </form>
  </div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
<!--modal-->
<!--modal-->
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
    $(document).ready(function()
    {
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
        ajax: '{{ route('get-sicktests') }}',
        columns: [
                {data: 'id', name: 'id'},
                {data: 'test_date', name: 'test_date'},
                {data: 'test_type', name: 'test_type'},
                {data: 'test_desc', name: 'test_desc'},
                {data: 'test_time', name: 'test_time'},
                {data: 'module_name', name: 'module_name'},
                {data: 'venue_name', name: 'venue_name'},
            ]

    });

    });

</script>
<script type="text/javascript">
    function toggleModal(modalID){

      document.getElementById(modalID).classList.toggle("hidden");
      document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
      document.getElementById(modalID).classList.toggle("flex");
      document.getElementById(modalID + "-backdrop").classList.toggle("flex");
    }
</script>

@endsection
