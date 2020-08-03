@extends('layouts.admin')

@section('content')

<div class="container">

        {{-- ///== the add pop up button====// --}}
      <div class="col-md-3 p-3">
             <button class="btn btn-primary"  data-toggle="modal" data-target="#add">Add New</button>
                </div>
                  <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="" width="100%">
                      <thead>
                        <tr>
                          <th scope="col">Id</th>
                  
                          <th scope="col">StNo</th>
                      
                          <th scope="col">FName</th>                      
                      
                          <th scope="col">LName</th>
                        
                          <th scope="col">Gender</th>
                        
                          <th scope="col">Type</th>
                      
                          <th scope="col">Department</th>
                                      
                          <th scope="col">PhoneNo</th>
                                        
                          <th scope="col">Email</th>
                        
                          <th scope="col">Username</th>

                          <th scope="col">Action</th>
            
                        </tr>
                      </thead>

        @if(count($staff) > 0)  
        @foreach ($staff as $staff)
              <tr>
              <td>{{ $staff->id }}</td>
              <td>{{ $staff->staff_number}}</td>
              <td>{{ $staff->first_name }}</td>            
              <td>{{ $staff->last_name }}</td>
              <td>{{ $staff->gender }}</td>
              <td>{{ $staff->type }}</td>
              <td>{{ $staff->department}}</td>
              <td>{{ $staff->phone_number }}</td>
              <td>{{ $staff->email }}</td>
              <td>{{ $staff->username }}</td>
              <td>
                <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ ($staff->staff_number) }}">Edit</a>
                <a href="#" type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{ ($staff->staff_number)}}1">Delete</a>
              </td>


{{-- //===start edit button pop up===// --}}
<div class="modal fade" id="{{ ($staff->staff_number) }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">STAFF DETAILS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('/Staffpost')}}" method="POST">
        {{csrf_field()}}
      <div class="modal-body">
                  <div class="form-group row">
            <div class="form-group col-md-6">
               <label for="inputStaffno">StaffNumber</label>
                 <input type="text" class="form-control" id="inputStaffno" name="staff_number" placeholder="Enter staff number" required>
               </div>
           <div class="form-group col-md-6">
         <label for="inputFirstname">First name</label>
      <input type="text" class="form-control" id="inputFirstname" name="first_name" placeholder="Enter first name" required>
  </div>
</div>
  <div class="form-group row">
     <div class="form-group col-md-6">
        <label for="inputMiddlename">Middle name</label>
          <input type="text" class="form-control" id="inputMiddlename" name="middle_name" placeholder="Enter middle name" required>
              </div>
            <div class="form-group col-md-6">
         <label for="inputLastname">Last name </label>
      <input type="text" class="form-control" id="inputLastname" name="last_name" placeholder="Enter last name" required>
   </div>
</div>
  <div class="form-group row">
     <div class="form-group col-md-3">
        <label for="inputDepartment">Department</label>
            <select name="department" id="inputDepartment" class="form-control" required>
            <option value="">select department type</option>
            <option value="CSE">CSE</option>
            <option value="CEIT">CEIT</option>
            <option value="ETE">ETE</option>
            <option value="CONAS">CONAS</option>>
            </select>
            </div>
                 <div class="form-group col-md-3">
                    <label for="inputGender">Gender</label>
                  <select id="inputGender" class="form-control" name="gender" required>
               <option value="">Select gender</option>
           <option value="male">male</option>
        <option value="female">female</option>
      </select>
   </div>
    <div class="form-group col-md-3">
                <label for="inputType">Type </label>
             <select id="inputType" class="form-control" name="type" required>
            <option value="">Select type of staff</option>
            <option value="Lecturer">Lecturer</option>
            <option value="Lab assistant">Lab assistant</option>
            <option value="Seminar leader">Seminar leader</option>
               </select>
           </div>
           <div class="form-group col-md-3">
       <label for="inputEmail">Email</label>
          <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter your email" required>
             <div class="invalid-feedback">Please enter a valid email address.</div>
              </div>
</div>
  <div class="form-row">
         <div class="form-group col-md-3">
       <label for="inputPhonenumber">Phone number</label>
     <input type="number" class="form-control" id="inputPhonenumber" name="phone_number" placeholder="Phone number" required>
</div>
<div class="form-group col-md-3">
        <label for="inputUsername">Username</label>
          <input type="text" class="form-control" id="inputUsername" name="username" placeholder="username" required>
              </div>
            <div class="form-group col-md-3">
         <label for="inputPassword">Password </label>
      <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
   </div>
       <div class="form-group col-md-3">
         <label for="inputPassword">Confirm</label>
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
{{-- //===End edit button pop up===// --}}


{{-- //====start delete modal pop up button===// --}}
<div class="modal fade" id="{{ ($staff->staff_number) }}1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">STAFF DETAILS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      {{-- ///===alert alert- =     ===/// --}}
      <div class="modal-body">
            <div>
                <p> Are you sure you want to delete <strong class="text-danger"><?php echo $staff->staff_number; ?></strong>?</p>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <a href='{{url("/delete_staff/{$staff->staff_number}")}}' class = "btn btn-danger">Delete</a>
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
        <h5 class="modal-title" id="exampleModalLabel">STAFF DETAILS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
           </button>
        </div>
      <form action="{{url('/Staffpost')}}" method="POST">
        {{csrf_field()}}
      <div class="modal-body">
                  <div class="form-group row">
            <div class="form-group col-md-6">
               <label for="inputStaffno">StaffNumber</label>
                 <input type="text" class="form-control" id="inputStaffno" name="staff_number" placeholder="Enter staff number" required>
               </div>
           <div class="form-group col-md-6">
         <label for="inputFirstname">First name</label>
      <input type="text" class="form-control" id="inputFirstname" name="first_name" placeholder="Enter first name" required>
  </div>
</div>
  <div class="form-group row">
     <div class="form-group col-md-6">
        <label for="inputMiddlename">Middle name</label>
          <input type="text" class="form-control" id="inputMiddlename" name="middle_name" placeholder="Enter middle name" required>
              </div>
            <div class="form-group col-md-6">
         <label for="inputLastname">Last name </label>
      <input type="text" class="form-control" id="inputLastname" name="last_name" placeholder="Enter last name" required>
   </div>
</div>
  <div class="form-group row">
     <div class="form-group col-md-3">
        <label for="inputDepartment">Department</label>
            <select name="department" id="inputDepartment" class="form-control" required>
            <option value="">select department type</option>
            <option value="CSE">CSE</option>
            <option value="CEIT">CEIT</option>
            <option value="ETE">ETE</option>
            <option value="CONAS">CONAS</option>>
            </select>
            </div>
                 <div class="form-group col-md-3">
                    <label for="inputGender">Gender</label>
                  <select id="inputGender" class="form-control" name="gender" required>
               <option value="">Select gender</option>
           <option value="male">male</option>
        <option value="female">female</option>
      </select>
   </div>
    <div class="form-group col-md-3">
                <label for="inputType">Type </label>
             <select id="inputType" class="form-control" name="type" required>
            <option value="">Select type of staff</option>
            <option value="Lecturer">Lecturer</option>
            <option value="Lab assistant">Lab assistant</option>
            <option value="Seminar leader">Seminar leader</option>
               </select>
           </div>
           <div class="form-group col-md-3">
       <label for="inputEmail">Email</label>
          <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter your email" required>
             <div class="invalid-feedback">Please enter a valid email address.</div>
              </div>
</div>
  <div class="form-row">
         <div class="form-group col-md-3">
       <label for="inputPhonenumber">Phone number</label>
     <input type="number" class="form-control" id="inputPhonenumber" name="phone_number" placeholder="Phone number" required>
</div>
<div class="form-group col-md-3">
        <label for="inputUsername">Username</label>
          <input type="text" class="form-control" id="inputUsername" name="username" placeholder="username" required>
              </div>
            <div class="form-group col-md-3">
         <label for="inputPassword">Password </label>
      <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
   </div>
       <div class="form-group col-md-3">
         <label for="inputPassword">Confirm</label>
      <input type="password" class="form-control" id="inputPassword" placeholder="Confirm Password" required>
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
