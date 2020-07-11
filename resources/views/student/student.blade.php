{{--  @extends('layouts.admin')
@section('content')

<body>
<div class="container">
 @if(session('message'))
{{session('message')}}
@endif
<div style="text-align: center; font-size: 2em"
    <h1>STUDENT REGISTRATION FORM</h1></div>
      <form class="bsams-validation" action="{{ url ('/Studentpost')}}" method="post">
        @csrf
         <div class="form-row">
            <div class="form-group col-md-6">
               <label for="inputRegno">RegNumber</label>
                 <input type="text" class="form-control" id="inputRegno" name="reg_number" placeholder="Enter registration number" required>
               </div>
           <div class="form-group col-md-6">
         <label for="inputFirstname">First name</label>
      <input type="text" class="form-control" id="inputFirstname" name="first_name" placeholder="Enter first name" required>
  </div>
</div>
  <div class="form-row">
     <div class="form-group col-md-6">
        <label for="inputMiddlename">Middle name</label>
          <input type="text" class="form-control" id="inputMiddlename" name="middle_name" placeholder="Enter middle name" required>
              </div>
            <div class="form-group col-md-6">
         <label for="inputLastname">Last name </label>
      <input type="text" class="form-control" id="inputLastname" name="last_name" placeholder="Enter last name" required>
   </div>
</div>
  <div class="form-row">
     <div class="form-group col-md-6">
        <label for="inputDatefBbirth">Date of birth</label>
           <input type="date" class="form-control datepicker" id="inputDateOfBirth" name="date_of_birth" placeholder="Enter your birth date" required>
              </div>
                 <div class="form-group col-md-6">
                    <label for="inputGender">Gender</label>
                  <select id="inputGender" class="form-control" name="gender" required>
               <option value="">Select gender</option>
           <option value="male">male</option>
        <option value="female">female</option>
      </select>
   </div>
</div>
  <div class="form-row">
     <div class="form-group col-md-4">
       <label for="inputEmail">Email</label>
          <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter your email" required>
             <div class="invalid-feedback">Please enter a valid email address.</div>
              </div>
               <div class="form-group col-md-4">
                <label for="inputYearOfStudy">Year of study </label>
             <select id="inputYearOfStudy" class="form-control" name="year_of_study" required>
            <option value="">Select year of study</option>
            <option value="2000">2000</option>
            <option value="2001">2001</option>
            <option value="2002">2002</option>
            <option value="2003">2003</option>
            <option value="2004">2004</option>
            <option value="2005">2005</option>
            <option value="2006">2006</option>
            <option value="2007">2007</option>
            <option value="2008">2008</option>
            <option value="2009">2009</option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            </select>
           </div>
         <div class="form-group col-md-4">
       <label for="inputPhonenumber">Phone number</label>
     <input type="number" class="form-control" id="inputPhonenumber" name="phone_number" placeholder="Phone number" required>
</div>
  </div> &nbsp;
     <div class="form-group col-md-12">
        <div class="col-sm-9 offset-sm-10">
           <input type="submit" class="btn btn-primary" value="Submit">
              <input type="reset" class="btn btn-secondary" value="Reset">
             </div>
          </div>
       </form>
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
})();
</script>
</body>
@endsection
@section('scripts')  --}}

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

    <h4>STUDENT REGISTRATION FORM</h4></div>
    <hr>
      <form class="bsams-validation" action="{{ url ('/Studentpost')}}" method="post">
        @csrf
         <div class="form-row">
            <div class="form-group col-md-6">
               <label for="inputRegno">RegNumber</label>
                 <input type="text" class="form-control" id="inputRegno" name="reg_number" placeholder="Enter registration number" required>
               </div>
           <div class="form-group col-md-6">
         <label for="inputFirstname">First name</label>
      <input type="text" class="form-control" id="inputFirstname" name="first_name" placeholder="Enter first name" required>
  </div>
</div>
  <div class="form-row">
     <div class="form-group col-md-6">
        <label for="inputMiddlename">Middle name</label>
          <input type="text" class="form-control" id="inputMiddlename" name="middle_name" placeholder="Enter middle name" required>
              </div>
            <div class="form-group col-md-6">
         <label for="inputLastname">Last name </label>
      <input type="text" class="form-control" id="inputLastname" name="last_name" placeholder="Enter last name" required>
   </div>
</div>
  <div class="form-row">
     <div class="form-group col-md-6">
        <label for="inputDatefBbirth">Date of birth</label>
           <input type="date" class="form-control datepicker" id="inputDateOfBirth" name="date_of_birth" placeholder="Enter your birth date" required>
              </div>
                 <div class="form-group col-md-6">
                    <label for="inputGender">Gender</label>
                  <select id="inputGender" class="form-control" name="gender" required>
               <option value="">Select gender</option>
           <option value="male">male</option>
        <option value="female">female</option>
      </select>
   </div>
</div>
  <div class="form-row">
     <div class="form-group col-md-4">
       <label for="inputEmail">Email</label>
          <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter your email" required>
             <div class="invalid-feedback">Please enter a valid email address.</div>
              </div>
               <div class="form-group col-md-4">
                <label for="inputYearOfStudy">Year of study </label>
             <select id="inputYearOfStudy" class="form-control" name="year_of_study" required>
            <option value="">Select year of study</option>
           
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            </select>
           </div>
         <div class="form-group col-md-4">
       <label for="inputPhonenumber">Phone number</label>
     <input type="number" class="form-control" id="inputPhonenumber" name="phone_number" placeholder="Phone number" required>
</div>
  </div> 
     <div class="form-group col-md-12">
        <div class="col-sm-10 offset-sm-9">
            <input type="submit" class="btn btn-primary" style="width: 15%" value="Submit">
              <input type="reset" class="btn btn-secondary" style="width: 15%" value="Reset">
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
</div>
</body>
@endsection
