@extends('layouts.admin')

@section('content')

<div class="container">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="" width="100%">
    <thead>
       <tr>
        <th class="th-sm">Id

        </th>
        <th class="th-sm">StNo

        </th>
        <th class="th-sm">FName

        </th>
        <th class="th-sm">MName

        </th>
        <th class="th-sm">LName

        </th>
        <th class="th-sm">Gender

        </th>
        </th>
        <th class="th-sm">Type

        </th>
        </th>
        <th class="th-sm">Department

        </th>
        </th>
        <th class="th-sm">PhoneNo

        </th>
        </th>
        <th class="th-sm">Email

        </th>
        </th>
        <th class="th-sm">Username

        </th>
      </tr>
    </thead>


    @foreach ($staff as $staff)
<tr>
<td>{{ $staff->id }}</td>
<td>{{ $staff->staff_number}}</td>
<td>{{ $staff->first_name }}</td>
<td>{{ $staff->middle_name }}</td>
<td>{{ $staff->last_name }}</td>
<td>{{ $staff->gender }}</td>
<td>{{ $staff->type }}</td>
<td>{{ $staff->department}}</td>
<td>{{ $staff->phone_number }}</td>
<td>{{ $staff->email }}</td>
<td>{{ $staff->username }}</td>
</tr>
@endforeach
  </table>
            </div>
        </div>
      </div>
    </div>
    </div>

@endsection
