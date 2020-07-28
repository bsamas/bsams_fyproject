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
                      <div class="col-md-10">

                          <div class="card">
                              <!-- HealthCare provider heading -->
                              <div class="card-header">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <h3>
                                              <i class="fa fa-users"> </i>
                                            Attendance
                                          </h3>
                                      </div>
                                  </div>
                              </div>


                              <div class="card-body">

                                  <div class="container-fluid" style="background: #ffffff">
                                      <div class="row justify-content-center">

                                          <div class="col-md-10" >

                                              <!-- STAFF TABS -->
                                              <div class="tabs-wrapper"  >
                                                  <ul class="nav nav-tabs nav-justified">


                                                      <li class="nav-item">
                                                          <a class="nav-link" href="/showStudent">
                                                              <i class="fa fa-money-bill"> </i>
                                                              Attendance Process
                                                          </a>
                                                      </li>

                                                      <li class="nav-item">
                                                          <a class="nav-link"
                                                             href="#">
                                                              <i class="fa fa-user-md"></i>
                                                            Report
                                                          </a>
                                                      </li>
                                                  </ul>
                                              </div>








                                              <div class="content-wrapper" style="background: #f8fafc;">







                                                <!-- List of Employees -->
{{--
                                                    <div>
                                                        <div>
                                                            <ul class="nav">
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="#">
                                                                        <i class="fa fa-user-plus"></i>
                                                                        Add
                                                                    </a>
                                                                </li>

                                                            </ul>
                                                        </div>  --}}


                                                    </div>
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

</body>
@endsection
@section('scripts')
