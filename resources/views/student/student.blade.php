@extends('layouts.admin')

@section('content')
@if(session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('message')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@elseif(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{session('error')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif

<div class="container">

            {{-- ///== the add pop up button====// --}}
                <div class="col-md-3 p-3">
                    <button class="btn btn-primary"  data-toggle="modal" data-target="#add">Add New</button>
                </div>


  <table id="data" class="table table-bordered" cellspacing="0" width="100%">
     <thead class="thead-light">
              <tr>
        <th scope="col">Id</th>

        <th scope="col">RegNo</th>

        {{--  <th scope="col">Fingerprint</th>  --}}

        <th scope="col">Fname</th>

        {{--  <th scope="col">Mname</th>  --}}

        <th scope="col">Lname</th>

        <th scope="col">Gender</th>

        {{--  <th scope="col">DOB</th>  --}}

        <th scope="col">YOS</th>

        {{--  <th scope="col">PhoneNo</th>  --}}

        <th scope="col">Email</th>
        <th scope="col">Action</th>

              </tr>
            </thead>

{{-- //=====check the list of student if its greater than 0 then can be displayed.====// --}}

@if(count($students) > 0)
@foreach ($students as $student)
<tr>
<td>{{ $student->id }}</td>
<td>{{ $student->reg_number}}</td>
{{--  <td>{{ $student->fingerprint}}</td>  --}}
<td>{{ $student->first_name }}</td>
{{--  <td>{{ $student->middle_name }}</td>  --}}
<td>{{ $student->last_name }}</td>
<td>{{ $student->gender }}</td>
{{--  <td>{{ $student->date_of_birth }}</td>  --}}
<td>{{ $student->year_of_study}}</td>
{{--  <td>{{ $student->phone_number }}</td>  --}}
<td>{{ $student->email }}</td>
<td>
    <a href="#" type="button" class="btn btn-link" data-toggle="modal" data-target="#edit_student" data-student="{{ ($student) }}">
        <i class="nav-icon fas fa-edit" ></i>
    </a>
    <a href="#" type="button" class="btn btn-link" data-toggle="modal" data-target="#{{ ($student->reg_number) }}1">
         <i class="fa fa-trash" aria-hidden="true"></i></a>

</td>



{{-- //====start delete modal pop up button===// --}}
<div class="modal fade" id="{{ ($student->reg_number) }}1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">STUDENT DETAILS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      {{-- ///===alert alert- =     ===/// --}}
      <div class="modal-body">
            <div>
                <p> Are you sure you want to delete <strong class="text-danger"><?php echo $student->reg_number; ?></strong>?</p>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <a href='{{url("/delete_student/{$student->id}")}}' class = "btn btn-danger">Delete</a>
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

    <!-- Start adding student -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">STUDENT DETAILS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
                </button>
                    </div>
                      <form action='{{url("/student")}}' method="POST">
                        {{csrf_field()}}
                         <div class="modal-body">
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
            <label>Last name </label>
                <input type="text" class="form-control" id="inputLastname" name="last_name" placeholder="Enter last name" required>
                    </div>
                        <div class="form-group col-md-6">
                    <label>Gender</label>
                  <select id="inputGender" class="form-control" name="gender" required>
               <option value="">Select gender</option>
           <option value="male">male</option>
        <option value="female">female</option>
      </select>
   </div>
</div>
  <div class="form-row">
     <div class="form-group col-md-6">
       <label>Email</label>
          <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter email" required>
             <div class="invalid-feedback">Please enter a valid email address.</div>
              </div>
               <div class="form-group col-md-6">
                <label>Year of study </label>
                <select id="inputYearOfStudy" class="form-control" name="year_of_study" required>
                <option value="">Select year </option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                </select>
            </div>
            </div>

         <div class="form-group row">
            <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-10">
                <input id="password" type="password" class="form-control" name="password" required>

                {{--  @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror  --}}
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
   <!-- End adding student -->



 {{-- //===start edit button pop up===// --}}

<div class="modal fade" id="edit_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">STUDENT DETAILS</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
                </button>
                 </div>
                      <form action='{{url("/student/{id}")}}' method="POST">
                        {{csrf_field()}}
                            <div class="modal-body">
                            <div class="form-row">
                        <div class="form-group col-md-6">
                    <label>RegNumber</label>
                 <input type="text" class="form-control" id="regno" name="reg_number" placeholder="Enter registration number" required>
               </div>
           <div class="form-group col-md-6">
         <label for="inputFirstname">First name</label>
      <input type="text" class="form-control" id="firstname" name="first_name" placeholder="Enter first name" required>
  </div>
</div>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputLastname">Last name </label>
             <input type="text" class="form-control" id="lastname" name="last_name" placeholder="Enter last name" required>
                </div>
                    <div class="form-group col-md-6">
                        <label>Gender</label>
                    <select id="gender" class="form-control" name="gender" required>
               <option value="">Select gender</option>
           <option value="male">male</option>
        <option value="female">female</option>
      </select>
   </div>
</div>
  <div class="form-row">
     <div class="form-group col-md-6">
       <label>Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
             <div class="invalid-feedback">Please enter a valid email address.</div>
              </div>
               <div class="form-group col-md-6">
                <label>Year of study </label>
             <select id="year" class="form-control" name="year_of_study" required>
            <option value="">Select year of study</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            </select>
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
@endsection

@section('scripts')
<script>
    $('#edit_student').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var student = button.data('student')
        console.log(student)
        var modal = $(this)
        modal.find('#regno').val(student['reg_number'])
        modal.find('#firstname').val(student['first_name'])
        modal.find('#middlename').val(student['middle_name'])
        modal.find('#lastname').val(student['last_name'])
        modal.find('#date').val(student['date_of_birth'])
        modal.find('gender').val(student['gender'])
        modal.find('#email').val(student['email'])
        modal.find('#year').val(student['year_of_study'])
        modal.find('#number').val(student['phone_number'])

    })
</script>

<script>
    $('document').ready(function(){
        $('#data'). DataTable();
    });
</script>
@endsection









