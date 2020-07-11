@extends('layouts.admin')

@section('content')

<div class="container">
<div class="wrapper-editor">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
       <tr>
        <th class="th-sm">Id

        </th>
        <th class="th-sm">Course Code

        </th>
        <th class="th-sm">Course Name

        </th>
        <th class="th-sm">Semester
        </th>

        <th class="th-sm">Year
        </th>
        

        <th class="th-sm">programme
        </th>
        </thead>


    @foreach ($courses as $course)
<tr>
<td>{{ $course->id }}</td>
<td>{{ $course->code}}</td>
<td>{{ $course->course_name }}</td>
<td>{{ $course->semester }}</td>
<td>{{ $course->year }}</td>
<td>{{ $course->programme_name }}</td>

</tr>
@endforeach
  </table>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
