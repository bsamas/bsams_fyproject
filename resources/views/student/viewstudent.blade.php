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
        <th class="th-sm">Id</th>

        <th class="th-sm">RegNo</th>
        
        <th class="th-sm">Fingerprint</th>
    
        <th class="th-sm">Fname</th>
        
        <th class="th-sm">Mname</th>        
    
        <th class="th-sm">Lname</th>
    
        <th class="th-sm">Gender</th>
               
        <th class="th-sm">DOB</th>

        <th class="th-sm">YOS</th>

        <th class="th-sm">PhoneNo</th>

        <th class="th-sm">Email</th>

        
      </tr>
    </thead>


    @foreach ($students as $student)
<tr>
<td>{{ $student->id }}</td>
<td>{{ $student->reg_number}}</td>
<td>{{ $student->fingerprint}}</td>
<td>{{ $student->first_name }}</td>
<td>{{ $student->middle_name }}</td>
<td>{{ $student->last_name }}</td>
<td>{{ $student->gender }}</td>
<td>{{ $student->date_of_birth }}</td>
<td>{{ $student->year_of_study}}</td>
<td>{{ $student->phone_number }}</td>
<td>{{ $student->email }}</td>
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
