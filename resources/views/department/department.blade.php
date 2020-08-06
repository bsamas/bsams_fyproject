@extends('layouts.admin')
@section('content')
<body>
 @if(session('message'))
{{session('message')}}
@endif
<div class="container">
<div class="row justify-content-center">
<div class="col-md-7">
<div class="card">
<div class="card-body">
<div style="text-align: center; font-size: 2em">
    <h4>REGISTER DEPARTMENT</h4></div>
    <hr>
      <form class="bsams-validation" action="{{ url ('/postdepartment')}}" method="post">
        @csrf
         <div class="form-group row">
            <div class="form-group col-md-12">
               <label for="inputDepartment">Department Name</label>
                 <input type="text" class="form-control" id="inputDepartment" name="name" placeholder="Enter department name" required>
               </div>
         </div>

          <div class="form-group row">
        <div class="col-sm-9 offset-sm-7">
           <input type="submit" class="btn btn-primary" style="width: 25%" value="Submit">
              <input type="reset" class="btn btn-secondary" style="width: 25%" value="Reset">
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
</body>
@endsection

