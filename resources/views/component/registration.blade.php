@extends('layouts.admin')


@section('content')

                      <!-- Contents -->
            <div class="container">
              <main class="py-4">
                  <div class="row justify-content-center">
                      <div class="col-md-12">
                          <div class="card">
                              <!-- bsams heading -->
                              <div class="card-header">
                                  <div class="row">
                                      <div class="col-md-8">
                                          <h3>
                                              <i class="nav-icon fas fa-edit"> </i>
                                            Register
                                          </h3>
                                      </div>
                                  </div>
                              </div>


                              <div class="card-body">
                                  <div class="container-fluid" style="background: #e3eee5">
                                      <div class="row justify-content-center">
                                          <div class="col-md-12" >

                                              <!-- bsams tabs -->
                                              <div class="tabs-wrapper"  >
                                                  <ul class="nav nav-tabs nav-justified">


                                                      <li class="nav-item">
                                                          <a class="nav-link" href="registereddepartment">
                                                              <i class="fa fa-money-bill"> </i>
                                                              Department
                                                          </a>
                                                      </li>

                                                      <li class="nav-item">
                                                          <a class="nav-link"  href="viewprogramme">

                                                              <i class="fa fa-user-md"> </i>
                                                             Programme
                                                          </a>
                                                      </li>


                                                      <li class="nav-item">
                                                          <a class="nav-link"  href="course">

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


                                               {{--  <div>
                                                        <div>
                                                            <ul class="nav">
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="">
                                                                        <i class="fa fa-user-plus"></i>
                                                                        Add
                                                                    </a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>  --}}

                                               {{--  <div class="content-wrapper" style="background: #f8fafc;">
                                              </div>  --}}
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </main>
            </div>
   @endsection
