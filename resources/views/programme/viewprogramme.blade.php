@extends('layouts.admin')

@section('content')

<div class="container">
<div class="wrapper-editor">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
       <tr>
        <th class="th-sm">Id

        </th>
        <th class="th-sm">programme Name
        </th>
        </thead>


    @foreach ($programmes as $programme)
    </tr>
<td>{{ $programme->id }}</td>
<td>{{ $programme->programme_name}}</td>


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
