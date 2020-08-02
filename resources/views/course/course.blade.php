         {{--  <!-- start add Modal -->  --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">REGISTER COURSE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                  <form action="{{url("/postcourse")}}" method="POST">
                  {{csrf_field() }}
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

                                  {{--  <div>
                                    Programmes
                                    <select class="form-control" name="programme_id">
                                      @foreach($programmes as $programme)
                                      <option value="{{ $programme->id }}">{{$programme->id}}</option>
                                      @endforeach
                                    </select>
                                </div>  --}}

                    </div>
                   

                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save data</button>
                            </div>
                   </form>
              </div>
          </div>
          </div>
     
      {{--  <!--End add modal-->  --}}


{{--  start edit modal  --}}
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">REGISTER COURSE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                  <form action="{{url("/postcourse")}}" method="POST" id="editForm">
                  {{csrf_field() }}
                  {{method_field('PUT')}}

                      <div class="modal-body">
                            <div class="form group">
                              <label>Course Code</label>
                              <input type="text" id="code" class="form-control"  name="code" placeholder="Enter course code" required>
                            </div>

                            <div class="form group">
                              <label>Course Name</label>
                              <input type="text" id="course_name" class="form-control"  name="course_name" placeholder="Enter course name" required>
                            </div>

                              <div class="form group">
                                  <label>Semester</label>
                                  <select class="form-control" id="semester" name="semester" required>
                                  <option value="">Select type of semester</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  </select>
                              </div>

                              <div class="form-group">
                                <label>Year</label>
                                <select class="form-control" id="year" name="year" required>
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

                                  {{--  <div>
                                    Programmes
                                    <select class="form-control" name="programme_id">
                                      @foreach($programmes as $programme)
                                      <option value="{{ $programme->id }}">{{$programme->id}}</option>
                                      @endforeach
                                    </select>
                                </div>  --}}

                    </div>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save data</button>
                            </div>
                  </form>
              </div>
          </div>
          </div>
     


      {{--  <!--End edit modal-->  --}}


@extends('layouts.admin')

@section('content')
  
 <div class="container">
    
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

            <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add New
              </button>
<br><br>

          <table class="table table-bordered" id="datatable">
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

            <tbody>
             {{-- //=====check the list of course if its greater than 0 then can be displayed.====// --}}
           
                @foreach ($courses as $course)
                <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->code}}</td>
                <td>{{ ($course->course_name) }}</td>
                <td>{{ $course->semester}}</td>
                <td>{{ ($course->year) }}</td>
                
                <td>
                    <a href="#" type="button" class="btn btn-primary" data-toggle="modal">Edit</a>
                    <a href="#" type="button" class="btn btn-danger" data-toggle="modal">Delete</a>
                </td>
                </tr>
                @endforeach
               
            </tbody>
          </table>

</div>
@endsection

@section('scripts')

        <script type="text/javascript">
        $(document).ready(function(){
          var table = $('#datatable') . Datatable();

          // start edit record//
          table.on('click', '.edit', function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
              $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            $('#code').val(data[1]);
            $('#course_name').val(data[2]);
            $('#semester').val(data[3]);
            $('#year').val(data[4]);

            $('#editForm').attr('url','/postcourse'/ + data[0]);
            $('#editModal').modal('show');
          })
              // End edit record //   
        )}
        </script>
        
@endsection