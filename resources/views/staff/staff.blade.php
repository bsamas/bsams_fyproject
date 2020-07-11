@extends('layouts.admin')
@section('content')
<body>
 @if(session('message'))
{{session('message')}}
@endif
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-body">
<div style="text-align: center; font-size: 2em">
    <h4>REGISTER STAFF</h4></div>
    <hr>
      <form class="bsams-validation" action="{{ url ('/Staffpost')}}" method="post">
        @csrf
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
         <label for="inputPassword">Confirm Password </label>
      <input type="password" class="form-control" id="inputPassword" placeholder="Confirm Password" required>
   </div>
  </div>
      <div class="form-group row">
        <div class="col-sm-7 offset-sm-9">
           <input type="submit" class="btn btn-primary" style="width: 20%" value="Submit">
              <input type="reset" class="btn btn-secondary" style="width: 20%" value="Reset">
           </div>
       </div>
       </form>
</div>
 </div>
</div>
</div>
</div>
<script>
    // Self-executing function
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('bsams-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
});
</script>
</body>
@endsection

