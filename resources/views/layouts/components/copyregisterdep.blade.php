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
<div class="wrapper-editor">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">


            {{-- ///== the add pop up button====// --}}
                <div class="col-md-3 p-3">
                    <button class="btn btn-primary"  data-toggle="modal" data-target="#add">Add New</button>
                </div>
                <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">


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
<td>{{ $department->department_name}}</td>
<td>
    <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ ($department->department_name) }}">Edit</a>
    <a href="#" type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{ ($department->department_name) }}1">Delete</a>

</td>




{{-- //===Modal for edit button pop up===// --}}
<div class="modal fade" id="{{ ($department->department_name) }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action='{{url("/edit_department/{$department->id}")}}' method="POST">
        @csrf
      <div class="modal-body">
            <div class="form-group">
                <label for="formGroupExampleInput">Department Name</label>
                <input type="text" name="department_name" class="form-control" id="formGroupExampleInput" value=<?php echo $department->department_name; ?>>
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
<div class="modal fade" id="{{ ($department->department_name) }}1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      {{-- ///===alert alert- =     ===/// --}}
      <div class="modal-body">
            <div>
                <p> Are you sure you want to delete <strong class="text-danger"><?php echo $department->department_name; ?></strong>?</p>
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
          </div>
      </div>
      </div>
    </div>

    <!-- Modal_for adding department -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action='{{url("/postdepartment")}}' method="POST">
        @csrf
      <div class="modal-body">
            <div class="form-group">
                <label for="formGroupExampleInput">Department Name</label>
                <input type="text" name="department_name" class="form-control" id="formGroupExampleInput" placeholder="add new">
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
</div>
@endsection

