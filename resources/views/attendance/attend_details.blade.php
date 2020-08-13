@extends('layouts.admin')

@section('content')

<div class="container">
  <div class="col-md-3 p-3">
      <button class="btn btn-primary"  data-toggle="modal" data-target="#add">Add New</button>
          </div>
            <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="" width="100%">                   
              @if(count($attendances) > 0)
              @foreach ($attendances as $attendance)
              <tr>
              <td>{{ $attendance->id }}</td>
              <td>{{ $attendance->status}}</td>
              <td>{{ $attendance->date }}</td>
              <td>{{ $attendance->type}}</td>
              <td>{{ $attendance->time }}</td>
              <td>{{ $attendance->count }}</td>
              {{--  //how to print foreign key details//   --}}
              <td>{{ $attendance->percentage}}</td>
              <td>{{ $attendance->course_id}}</td>
              <td>{{ $attendance->student_id}}</td>
                         
</tr>
@endforeach
@endif
  </table>
 </div>



  <!-- Start taking attendance  -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">attendance DETAILS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
              </button>
                </div>
                  <form action="{{url('/attendancepost')}}" method="POST">
                    {{csrf_field()}}
                      <div class="modal-body">
                        <div class="form-group row">
                      <div class="form-group col-md-6">
                    <label>course</label>
                 <input type="text" class="form-control" name="course_id" placeholder="Enter course code" required>
               </div>
           <div class="form-group col-md-6">
         <label>First name</label>
      <input type="text" class="form-control" name="first_name" placeholder="First name" required>
  </div>
</div>
  <div class="form-group row">
     <div class="form-group col-md-6">
        <label>Middle name</label>
          <input type="text" class="form-control" id="inputMiddlename" name="middle_name" placeholder=" Middle name" required>
              </div>
            <div class="form-group col-md-6">
         <label>Last name </label>
      <input type="text" class="form-control" id="inputLastname" name="last_name" placeholder=" Last name" required>
   </div>
</div>
  <div class="form-group row">
     <div class="form-group col-md-3">
        <label>Department</label>
            <select name="department_id" class="form-control" required>
             // this loops the department details from the table department
               {{--  @foreach($departments as $department)
                 <option value="{{$department->id}}">{{$department->department_name}}</option>

                  @endforeach  --}}
                   </select>
                    </div>
                    <div class="form-group col-md-3">
                    <label>Gender</label>
                  <select id="inputGender" class="form-control" name="gender" required>
               <option value="">Select gender</option>
           <option value="male">male</option>
        <option value="female">female</option>
      </select>
   </div>pghphlkkbl;fgklfk
<div class="form-group col-md-3">
  <label>Type </label>
    <select id="inputType" class="form-control" name="type" required>
      <option value="">Type of attendance</option>
        <option value="Lecturer">Lecturer</option>
          <option value="Lab assistant">Lab assistant</option>
            <option value="Seminar leader">Seminar leader</option>
              </select>
                </div>
                  <div class="form-group col-md-3">
                    <label>Email</label>
                  <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter email" required>
                <div class="invalid-feedback">Please enter a valid email address.</div>
              </div>
            </div>
          <div class="form-row">
        <div class="form-group col-md-3">
      <labe>Number</label>
    <input type="number" class="form-control" id="inputPhonenumber" name="phone_number" placeholder="Number" required>
  </div>
<div class="form-group col-md-3">
  <label>Username</label>
    <input type="text" class="form-control" id="inputUsername" name="username" placeholder="username" required>
      </div>
        <div class="form-group col-md-3">
          <label>Password </label>
           <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
            </div>
              <div class="form-group col-md-3">
                <label>Confirm</label>
                  <input type="password" class="form-control" id="inputPassword" placeholder="Password" required>
                    </div>
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

@endsection
