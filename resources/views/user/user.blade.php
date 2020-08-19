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
  <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th scope="col">Id</th>

          {{--  <th scope="col">StNo</th>  --}}

            <th scope="col">Name</th>

                <th scope="col">Gender</th>

                  <th scope="col">Type</th>

                <th scope="col">Department</th>

            <th scope="col">Email</th>
            <th scope="col">Action</th>

           {{--  <th scope="col">Username</th>     <th scope="col">Action</th>  --}}
      </tr>
    </thead>
    @if(count($users) > 0)

      @foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
            {{--  <td>{{ $user->user_number}}</td>  --}}
              <td>{{ $user->name }}</td>
                {{--  <td>{{ $user->last_name }}</td>  --}}
                  <td>{{ $user->gender }}</td>
                    <td>{{ $user->type }}</td>
                    {{--  //how to print foreign key details//  --}}
                <td>{{ $user->department_id}}</td>
              {{--  <td>{{ $user->phone_number }}</td>  --}}
            <td>{{ $user->email }}</td>
          {{--  <td>{{ $user->username }}</td>  --}}
          <td>
            <a href="#" type="button" class="btn btn-link" data-toggle="modal" data-target="#edit_user">
              <i class="nav-icon fas fa-edit" ></i>
            </a>
            <a href="#" type="button" class="btn btn-link" data-toggle="modal" data-target="#{{ ($user->user_number)}}1">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
          </td>
             {{-- //===start edit button pop up===// --}}
          <div class="modal fade" id="{{ ($user->user_number) }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">user DETAILS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('/userpost')}}" method="POST">
                  {{csrf_field()}}
                    <div class="modal-body">
                      <div class="form-group row">

                          <div class="form-group col-md-6">
                            <label for="inputuserno">userNumber</label>
                            <input type="text" class="form-control" id="inputuserno" name="user_number" placeholder="Enter user number" required>
                          </div>

                        <div class="form-group col-md-6">
                          <label for="inputFirstname">name</label>
                          <input type="text" class="form-control" id="inputFirstname" name="name" placeholder="Enter name" required>
                        </div>
                      </div>

              <div class="form-group row">
                <div class="form-group col-md-6">
                    <label for="inputDepartment">Department</label>
                        <select name="department" id="inputDepartment" class="form-control" required>
                        {{--  @foreach($departments as $user)
                          <tr>
                          <td>{{$user->id}}</td>
                          <td>{{$user->department_name}}</td>
                          </tr>
                          @endforeach  --}}
                        </select>
                        </div>
                            <div class="form-group col-md-6">
                                <label for="inputGender">Gender</label>
                              <select id="inputGender" class="form-control" name="gender" required>
                          <option value="">Select gender</option>
                      <option value="male">male</option>
                    <option value="female">female</option>
                  </select>
              </div>
                <div class="form-group col-md-6">
                            <label for="inputType">Type </label>
                        <select id="inputType" class="form-control" name="type" required>
                        <option value="">Type of user</option>
                        <option value="Lecturer">Lecturer</option>
                        <option value="Assistant">Assistant</option>
                        <option value="SemLeader">SemLeader</option>
                          </select>
                      </div>
                      <div class="form-group col-md-6">
                  <label for="inputEmail">Email</label>
                      <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter email" required>
                        <div class="invalid-feedback">Please enter a valid email address.</div>
                          </div>
                         </div>

                        <div class="form-group col-md-6">
                    <label>Password </label>
                  <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
              </div>
                  <div class="form-group col-md-6">
                    <label>Confirm Password</label>
                  <input type="password" class="form-control" id="inputPassword" placeholder="Password" required>
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



              {{-- //===End edit button pop up===// --}}


              {{-- //====start delete modal pop up button===// --}}
              <div class="modal fade" id="{{ ($user->user_number) }}1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">user DETAILS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>


                  {{-- ///===alert alert- =     ===/// --}}
                  <div class="modal-body">
                        <div>
                            <p> Are you sure you want to delete <strong class="text-danger"><?php echo $user->user_number; ?></strong>?</p>
                        </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <a href='{{url("/delete_user/{$user->user_number}")}}' class = "btn btn-danger">Delete</a>
                  </div>

                </div>
              </div>
              </div>
              {{--  //====end delete modal pop up button===//   --}}

              </tr>
              @endforeach
              @endif
  </table>




  <!-- Start adding course -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">USER DETAILS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
           </button>
        </div>
      <form action="{{url('/user')}}" method="POST">
        {{csrf_field()}}
      <div class="modal-body">
          <div class="form-group row">
          <div class="form-group col-md-6">
         <label>Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
  </div>
     <div class="form-group col-md-6">
        <label>Department</label>
            <select name="department_id" class="form-control" required>
            // this loops the department details from the table department
                  @foreach($departments as $department)
                      <option value="{{$department->name}}">{{$department->name}}</option>
                        @endforeach
                        </select>
                      </div>
                      </div>
                      <div class="form group row">
                     <div class="form-group col-md-6">
                    <label for="inputGender">Gender</label>
                  <select id="inputGender" class="form-control" name="gender" required>
               <option value="">Select gender</option>
           <option value="male">male</option>
        <option value="female">female</option>
      </select>
   </div>
    <div class="form-group col-md-6">
                <label for="inputType">Type </label>
             <select id="inputType" class="form-control" name="type" required>
            <option value="">Type of user</option>
            <option value="Lecturer">Lecturer</option>
            <option value="Assistant">Assistant</option>
            <option value="SemLeader">SemLeader</option>
               </select>
           </div>
            </div>
            <div class="form-group row">
           <div class="form-group col-md-6">
       <label>Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
             <div class="invalid-feedback">Please enter a valid email address.</div>
              </div>
                    {{--  <div class="form-group col-md-6">
                    <label for="inputGender">Role</label>
                  <select id="role" class="form-control" name="role" required>
               <option value="">Select gender</option>
           <option value="male">admin</option>
        <option value="female">staff</option>
      </select>
   </div>  --}}
</div>

                <div class="form-group row">
            <div class="form-group col-md-6">
         <label>Password </label>
      <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
   </div>
       <div class="form-group col-md-6">
         <label>Confirm</label>
      <input type="password" class="form-control" id="inputPassword" placeholder="Password" required>
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
</div>
   <!-- End adding course -->

@endsection

@section('scripts')

<script>
$('document').ready(function(){
  $('#data').DataTable();
});
</script>

@endsection
