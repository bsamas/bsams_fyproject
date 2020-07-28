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
<div class="card">
            {{-- ///== the add pop up button====// --}}
                <div class="col-md-3 p-3">
                    <button class="btn btn-primary"  data-toggle="modal" data-target="#add">Add New</button>
                </div>
                <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">


    <thead>
       <tr>
        <th class="th-sm">Id
        </th>

        <th class="th-sm">Course course_name
        </th>


        <th class="th-sm">Action
        </th>
    </tr>
    </thead>



    {{-- //=====check the list of programme if its greater than 0 then can be displayed.====// --}}
@if(count($courses) > 0)
@foreach ($courses as $course)
<tr>
<td>{{ ($course->id) }}</td>
<td>{{ $course->course_name}}</td>

<td>
    <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ ($course->course_name) }}">Edit</a>
    <a href="#" type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{ ($course->course_name) }}1">Delete</a>

</td>



{{-- //===Modal for edit button pop up===// --}}
<div class="modal fade" id="{{ ($course->course_name) }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action='{{url("/edit_course/{$course->id}")}}' method="POST">
        @csrf
      <div class="modal-body">
            <div class="form-group">
                <label for="formGroupInput">Course course_name</label>
                <input type="text" name="course_name" class="form-control" id="formGroupInput"  value="<?php echo $course->course_name; ?>">
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
<div class="modal fade" id="{{ ($course->course_name) }}1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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
                <p> Are you sure you want to delete <strong class="text-danger"><?php echo $course->course_name; ?></strong>?</p>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <a href='{{url("/delete_course/{$course->id}")}}' class = "btn btn-danger">Delete</a>
      </div>

    </div>
  </div>
</div>


</tr>
@endforeach
@endif
  </table>
 </div>


    <!-- Modal_for adding course -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action='{{url("/postcourse")}}' method="POST">
        {{csrf_field()}}
      <div class="modal-body">
                <div class="form-group">
                <label>Course Name</label>
                <input type="text" name="course_name" class="form-control" id="formGroupExampleInput" placeholder="add new">
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



