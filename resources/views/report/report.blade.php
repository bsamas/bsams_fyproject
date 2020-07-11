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
        <th class="th-sm">RegNo

        </th>
        <th class="th-sm">CourseCode

        </th>
        <th class="th-sm">Type

        </th>
        <th class="th-sm">Status

        </th>
        <th class="th-sm">Date

        </th>
        </th>
        <th class="th-sm">Time

        </th>
        </th>
        <th class="th-sm">Count

        </th>
        </th>
        <th class="th-sm">Percentage

        </th>

      </tr>
    </thead>


    @foreach ($attendances as $attendance)
<tr>
<td>{{ $attendance->id }}</td>
<td>{{ $attendance->Reg_number}}</td>
<td>{{ $attendance->code }}</td>
<td>{{ $attendance->type }}</td>
<td>{{ $attendance->status }}</td>
<td>{{ $attendance->date }}</td>
<td>{{ $attendance->time }}</td>
<td>{{ $attendance->count}}</td>
<td>{{ $attendance->percentage }}</td>

</tr>
@endforeach
  </table>
            </div>
        </div>
      </div>
    </div>
    </div>

@endsection
