@extends('layout.app')
@section('styles')

<body>


 <div class="container">
 @if(session('message'))
{{session('message')}}
@endif

          <!-- Content -->
              <main class="py-4">
                  <div class="row justify-content-center">
                      <div class="col-md-12">

                          <div class="card">
                              <!-- HealthCare provider heading -->
                              <div class="card-header">
                                  <div class="row">
                                      <div class="col-md-12">
                                          <h3>
                                              <i class="fa fa-users"> </i>
                                            Registration
                                          </h3>
                                      </div>
                                  </div>
                              </div>


                              <div class="card-body">

                                  <div class="container-fluid" style="background: #ffffff">
                                      <div class="row justify-content-center">

                                          <div class="col-md-12" >

                                              <!-- STAFF TABS -->
                                              <div class="tabs-wrapper"  >
                                                  <ul class="nav nav-tabs nav-justified">


                                                      <li class="nav-item">
                                                          <a class="nav-link" href="#">
                                                              <i class="fa fa-money-bill"> </i>
                                                              Department
                                                          </a>
                                                      </li>

                                                      <li class="nav-item">
                                                          <a class="nav-link"
                                                             href="#">
                                                              <i class="fa fa-user-md"> </i>
                                                             Programme
                                                          </a>
                                                      </li>


                                                      <li class="nav-item">
                                                          <a class="nav-link  "
                                                             href="#">
                                                              <i class="fa fa-microscope"> </i>
                                                              Course
                                                          </a>
                                                      </li>

                                                      <li class="nav-item">
                                                          <a class="nav-link" href="#">
                                                              <i class="fa fa-pills"> </i>
                                                              Staff
                                                          </a>
                                                      </li>
                                                      <li class="nav-item">
                                                          <a class="nav-link" href="#">
                                                              <i class="fa fa-pills"> </i>
                                                            Student
                                                          </a>
                                                      </li>

                                                  </ul>
                                              </div>


                                              <div class="content-wrapper" style="background: #f8fafc;">
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </main>
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
})();
</script>
</body>
@endsection
@section('scripts')
