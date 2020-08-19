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

            {{-- ///== the add pop up button====// --}}
                <div class="col-md-3 p-3">
                    <button class="btn btn-primary"  data-toggle="modal" data-target="#add">Add New</button>
                </div>
                <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">


    <thead>
       <tr>
        <th class="th-sm">Id
        </th>
        <th class="th-sm">Department Name
        </th>
        <th class="th-sm">Action
        </th>
    </tr>
    </thead>



    {{-- //=====check the list of department if its greater than 0 then can be displayed.====// --}}
@if(count($departments) > 0)
@foreach ($departments as $department)
<tr>
<td>{{ ($department->id) }}</td>
<td>{{ $department->name}}</td>
<td>
    <a href="#" type="button" class="btn btn-link" data-toggle="modal" data-target="#edit_department" data-department="{{ ($department) }}">
         <i class="nav-icon fas fa-edit" ></i></a>
    <a href="#" type="button" class="btn btn-link" data-toggle="modal" data-target="#delete_department" data-department="{{ ($department) }}">
        <i class="fa fa-trash" aria-hidden="true"></i></a>

</td>



{{-- //===Modal for edit button pop up===// --}}
<div class="modal fade" id="edit_department" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Department Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action='{{url("/edit_department/{$department->id}")}}' method="POST">
        @csrf
      <div class="modal-body">
            <div class="form-group">
                <label>Department Name</label>
                <input type="text" name="name" class="form-control" id="edit_name"  value="<?php echo $department->department_name; ?>" required>
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
<div class="modal fade" id="delete_department" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Department Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      {{-- ///===alert alert- =     ===/// --}}
      <div class="modal-body">
            <div>
                <p> Are you sure you want to delete <strong class="text-danger"><?php echo $department->name; ?></strong>?</p>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <a href='{{url("/delete_department/{$department->id}")}}' class = "btn btn-danger">Delete</a>
      </div>

    </div>
  </div>
</div>




</tr>
@endforeach
@endif
  </table>



    <!-- Modal_for adding department -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Department Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action='{{url("/department")}}' method="POST">
        @csrf
      <div class="modal-body">
            <div class="form-group">
                <label for="formGroupExampleInput">Department Name</label>
                <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="add new">
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
    $('#edit_department').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var department = button.data('department')
        console.log(department)
        var modal = $(this)

        modal.find('#edit_name').val(department['name'])

    })
</script>

<script>
    $('#delete_department').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var department = button.data('department')
        console.log(department)

    })
</script>
@endsection
