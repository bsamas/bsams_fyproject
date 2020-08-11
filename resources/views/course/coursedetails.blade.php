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


  <table id="data" class="table table-bordered" cellspacing="0" width="100%">
     <thead class="thead-light">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Course Code</th>
                <th scope="col">Course Name</th>
                <th scope="col">Programme</th>
                <th scope="col">Semester</th>
                <th scope="col">Class of Study</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

{{-- //=====check the list of course if its greater than 0 then can be displayed.====// --}}

@if(count($courses) > 0)
@foreach ($courses as $course)
<tr>
<td>{{ ($course->id) }}</td>
<td>{{ $course->code}}</td>
<td>{{ ($course->course_name) }}</td> 
<td>{{ ($course->programme_id) }}</td>
<td>{{ $course->semester}}</td>
<td>{{ ($course->class) }}</td>
<td>
    <a href="#" type="button" class="btn btn-link" data-toggle="modal" data-target="#edit_course" data-course="{{ ($course) }}">
        <i class="nav-icon fas fa-edit"></i></a>
    <a href="#" type="button" class="btn btn-link" data-toggle="modal" data-target="#{{ ($course->code) }}1">
        <i class="fa fa-trash" aria-hidden="true"></i></a>

</td>



{{-- //====start delete modal pop up button===// --}}
<div class="modal fade" id="{{ ($course->code) }}1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">COURSE DETAILS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      {{-- ///===alert alert- =     ===/// --}}
      <div class="modal-body">
            <div>
                <p> Are you sure you want to delete <strong class="text-danger"><?php echo $course->code; ?></strong>?</p>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <a href='{{url("/delete_course/{$course->id}")}}' class = "btn btn-danger">Delete</a>
      </div>

    </div>
  </div>
</div>
 {{--  //====end delete modal pop up button===//   --}}

</tr>
@endforeach
@endif
  </table>
 </div>

    <!-- Start adding course -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">COURSE DETAILS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
           </button>
        </div>
      <form action='{{url("/course")}}' method="POST">
        {{csrf_field()}}
      <div class="modal-body">
               <div class="form group">
                              <label>Course Code</label>
                              <input type="text" class="form-control"  name="code" placeholder="Enter course code" required>
                            </div>

                            <div class="form group">
                              <label>Course Name</label>
                              <input type="text" class="form-control"  name="course_name" placeholder="Enter course name" required>
                            </div>

                              <div class="form group">
                                  <label>Semester</label>
                                  <select class="form-control" name="semester" required>
                                  <option value="">Select type of semester</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  </select>
                              </div>

                              <div class="form group">
                                  <label>Programme</label>
                                  <select class="form-control" name="programme_id" required>
                                  <option value="">Select programme</option>
                                  @foreach ($programmes as $programme)
                                  <option value="{{$programme->name}}">{{$programme->name}}</option>
                                  @endforeach
                                  </select>
                              </div>

                              <div class="form-group">
                                  <label>Class</label>
                                  <select class="form-control" name="class" required>
                                  <option value="">Select class of study</option>
                                    <option value="First year">First year</option>
                                    <option value="Second year">Second year</option>
                                    <option value="Third year">Third year</option>
                                    <option value="Fourth year">Fourth year</option>
                                    <option value="Fifth year">Fifth year</option>
                                        
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
   <!-- End adding course -->



 {{-- //===start edit button pop up===// --}}

   <div class="modal fade" id="edit_course" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">COURSE DETAILS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action='{{url("/edit_course/{id}")}}' method="POST">
        {{csrf_field()}}
       
            <div class="modal-body">
                  <div class="form group">
                    <label>Course Code</label>
                      <input type="text" class="form-control" id="edit_code"  name="code" placeholder="Enter course code" required>
                        </div>

                        <div class="form group">
                          <label>Course Name</label>
                          <input type="text" class="form-control" id="course_name"  name="course_name" placeholder="Enter course name" required>
                        </div>

                          <div class="form group">
                                  <label>Programme</label>
                                  <select class="form-control" id="edit_programme" name="programme_id" required>
                                  <option value="">Select programme</option>
                                  @foreach ($programmes as $programme)
                                  <option value="{{$programme->name}}">{{$programme->name}}</option>
                                  @endforeach
                                  </select>
                              </div>
                          <div class="form group">
                              <label>Semester</label>
                              <select class="form-control" id="edit_semester" name="semester" required>
                              <option value="">Select type of semester</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              </select>
                          </div>

                          <div class="form-group">
                            <label>Class</label>
                            <select class="form-control" id="edit_class" name="class" required>
                           
                            <option value="">Select class of study</option>
                            <option value="First year">First year</option>
                            <option value="Second year">Second year</option>
                            <option value="Third year">Third year</option>
                            <option value="Fourth year">Fourth year</option>
                            <option value="Fifth year">Fifth year</option>
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

{{-- //===End edit button pop up===// --}}
@endsection

@section('scripts')
<script>
    $('#edit_course').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var course = button.data('course')
        console.log(course)
        var modal = $(this)
        modal.find('#edit_code').val(course['code'])
        modal.find('#course_name').val(course['course_name'])
        modal.find('#edit_semester').val(course['semester'])
        modal.find('#edit_class').val(course['class'])
        modal.find('#edit_programme').val(course['programme_id'])

    })
</script>
<script>
$(document).ready(function(){
  $('#data').DataTable();
});
</script>

@endsection

