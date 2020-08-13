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
{{-- <div style="text-align: center; font-size: 2em">

    <h4>STUDENT REGISTRATION FORM</h4></div>
    <hr> --}}
      <form action="{{ url ('/Studentpost')}}" method="post">
        @csrf
         <div class="form-row">
            <div class="form-group col-md-6">
               <label>Report Type</label>
                 <select id="inputYearOfStudy" class="form-control" name="year_of_study" required>
                  <option value="">select report type</option>
                  <option value="Lecture session">Lecture session</option>
                    <option value="Practical session">Practical session</option>
                  <option value="Seminar session">Seminar session</option>
                 </select>
               </div>
           <div class="form-group col-md-6">
         <label> Course </label>
      <select name="course_id" class="form-control" required>
          @foreach ($courses as $course)
         <option value="{{$course->course_id}}">{{$course->code}}</option>
          @endforeach
      </select>
  </div>
</div>


  <div class="form-row">
     <div class="form-group col-md-6">
        <label>Start Date</label>
           <input type="date" class="form-control datepicker" id="inputDateOfBirth" name="date_of_birth" placeholder="Enter your birth date" required>
              </div>
                 <div class="form-group col-md-6">
                  <label>End Date</label>
           <input type="date" class="form-control datepicker" id="inputDateOfBirth" name="date_of_birth" placeholder="Enter your birth date" required>
   </div>
</div>

     <div class="form-group col-md-12">
        <div class="col-sm-10 offset-sm-8">
            <input type="submit" class="btn btn-primary" style="width: 20%" value="Generate report">
              {{--  <input type="reset" class="btn btn-secondary" style="width: 15%" value="Reset">  --}}
             </div>
          </div>
       </form>
   </div>
</div>
</div>
</div>
</div>
</body>
@endsection
