@extends('layouts.admin')

@section('content')
@if(session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('message')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@elseif(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{session('error')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif

<div class="container">
{{--  <div class="card">  --}}
            {{-- ///== the add pop up button====// --}}
    <div class="col-md-3 p-3">
        <button class="btn btn-primary"  data-toggle="modal" data-target="#add">Add New</button>
            </div>
    <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
       <tr>
        <th class="th-sm">Id
        </th>
        <th class="th-sm">Name
        </th>
        <th class="th-sm">Department
        </th>
        <th class="th-sm">Action
        </th>
    </tr>
    </thead>



    {{-- //=====check the list of if its greater than 0 then can be displayed.====// --}}
@if(count($programmes) > 0)
@foreach ($programmes as $programme)
<tr>
<td>{{ ($programme->id) }}</td>
<td>{{ $programme->name}}</td>
<td>{{ $programme->department_id}}</td>
<td>
    <a href="#" type="button" class="btn btn-link" data-toggle="modal" data-target="#edit_programme" data-programme="{{ ($programme) }}">
        <i class="nav-icon fas fa-edit" ></i></a>
    <a href="#" type="button" class="btn btn-link" data-toggle="modal" data-target="#delete_programme" data-programme="{{ ($programme) }}">
        <i class="fa fa-trash" aria-hidden="true"></i></a>

</td>



{{-- //===Modal for edit button pop up===// --}}
<div class="modal fade" id="edit_programme" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Programme Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action='{{url("/edit_programme/{$programme->id}")}}' method="POST">
        @csrf
      <div class="modal-body">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" id="edit_name"  value="<?php echo $programme->name; ?>">
            </div>

             <div class="form group">
                <label>Department</label>
                <select class="form-control" id="edit_department" name="department_id" required>
                <option value="">Select programme</option>
                @foreach ($departments as $department)
                <option value="{{$department->name}}">{{$department->name}}</option>
                @endforeach
                </select>

                </div>
               </div>
               <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>.
    </div>
  </div>
</div>



{{-- //====delete modal pop up button===// --}}
<div class="modal fade" id="delete_programme" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Programme Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      {{-- ///===alert alert- =     ===/// --}}
      <div class="modal-body">
            <div>
                <p> Are you sure you want to delete <strong class="text-danger"><?php echo $programme->name; ?></strong>?</p>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <a href='{{url("/delete_programme/{$programme->id}")}}' class = "btn btn-danger">Delete</a>
      </div>

    </div>
  </div>
</div>




</tr>
@endforeach
@endif
  </table>
          {{--  </div>  --}}


    <!-- Modal_for adding -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Programme Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action='{{url("/postprogramme")}}' method="POST">
        @csrf
      <div class="modal-body">
            <div class="form-group">
                <label for="formGroupInput">Name</label>
                <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="add new">
            </div>

             <div class="form group">
                <label>Department</label>
                <select class="form-control" id="department" name="department_id" required>
                <option value="">Select programme</option>
                @foreach ($departments as $department)
                <option value="{{$department->name}}">{{$department->name}}</option>
                @endforeach
                </select>
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>.
    </div>
  </div>
 </div>
</div>
@endsection

@section('scripts')
<script>
    $('#edit_programme').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var programme = button.data('programme')
        console.log(programme)
        var modal = $(this)
        modal.find('#edit_name').val(programme['name'])
        modal.find('#edit_department').val(programme['department_id'])

    })
</script>

<script>
    $('#delete_programme').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var programme = button.data('programme')
        console.log(programme)


    })
</script>

<script>
$('document').ready( function () {
    $('#data').DataTable();
} );
</script>
@endsection
