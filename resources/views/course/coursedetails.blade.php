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
                <th scope="col">Semester</th>
                <th scope="col">Year of Study</th>
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
<td>{{ $course->semester}}</td>
<td>{{ ($course->year) }}</td>
<td>
    <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_course" data-course="{{ ($course) }}">Edit</a>
    <a href="#" type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{ ($course->code) }}1">Delete</a>

</td>



{{-- //===start edit button pop up===// --}}

{{-- //===End edit button pop up===// --}}


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
      <form action='{{url("/postcourse")}}' method="POST">
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

                              <div class="form-group">
                                  <label>Year</label>
                                  <select class="form-control" name="year" required>
                                  <option value="">Select of study</option>
                                  <option value="2010">2010</option>
                                  <option value="2011">2011</option>
                                  <option value="2012">2012</option>
                                  <option value="2013">2013</option>
                                  <option value="2014">2014</option>
                                  <option value="2015">2015</option>
                                  <option value="2016">2016</option>
                                  <option value="2017">2017</option>
                                  <option value="2018">2018</option>
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


   <div class="modal fade" id="edit_course" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">COURSE DETAILS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action='{{url("/edit_course/{$course->id}")}}' method="POST">
        @csrf
            <div class="modal-body">
                  <div class="form group">
                    <label>Course Code</label>
                      <input type="text" class="form-control" id="edit_code"  name="code" placeholder="Enter course code" required>
                        </div>

                        <div class="form group">
                          <label>Course Name</label>
                          <input type="text" class="form-control" id="edit_course_name"  name="course_name" placeholder="Enter course name" required>
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
                            <label>Year</label>
                            <select class="form-control" id="edit_year" name="year" required>
                            <option value="">Select type of semester</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
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
@endsection

@section('scripts')
<script>
    $('#edit_course').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var course = button.data('course')
        console.log(course)
        var modal = $(this)
        modal.find('#edit_code').val(course['code'])
        modal.find('#edit_course_name').val(course['edit_course_name'])
        modal.find('#edit_semester').val(course['semester'])
        modal.find('#edit_year').val(course['year'])

    })
</script>
@endsection

