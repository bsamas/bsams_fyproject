@extends('layouts.admin')
@section('content')
<body>

 @if(session('message'))
{{session('message')}}
@endif
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-body">
<form class="bsams-validation" action="{{ url ('postCourse')}}" method="POST">
 @csrf
<div style="text-align: center; font-size: 2em">
    <h4>REGISTER COURSE</h4></div>
    <hr>
            <div class="form-group row">
               <label for="inputCourseCode">CourseCode</label>
                 <input type="text" class="form-control" id="inputCourseCode" name="code" placeholder="Enter course code" required>
               </div>

           <div class="form-group row">
         <label for="inputCoursecode">Course name</label>
      <input type="text" class="form-control" id="inputFirstname" name="course_name" placeholder="Enter course name" required>
</div>
  <div class="form-group row">
            <label for="inputSemester">Semester</label>
            <select id="inputSemester" class="form-control" name="semester" required>
            <option value="">Select type of semester</option>
            <option value="1">1</option>
            <option value="2">2</option>
            </select>
           </div>
  <div class="form-group row">
            <label for="inputYear">Year</label>
            <select id="inputYear" class="form-control" name="year" required>
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

           <div>
               Programmes
               <select class="form-control" name="programme_id">
                @foreach($programmes as $programme)
                <option value="{{ $programme->id }}">{{$programme->id}}</option>
                @endforeach
               </select>
           </div>

        <div class="col-sm-9 offset-sm-8">
           <input type="submit" class="btn btn-primary" style="width: 20%" value="Submit">
              <input type="reset" class="btn btn-secondary" style="width: 20%" value="Reset">
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

