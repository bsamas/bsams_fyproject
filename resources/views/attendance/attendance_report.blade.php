@extends('layouts.admin')


@section('content')

                      <!-- Contents -->
            <div class="container">
              <main class="py-4">
                  <div class="row justify-content-center">
                      <div class="col-md-8">
                          {{--  <div class="card">  --}}
                              <!-- bsams heading -->
                              <div class="card-header">
                                  <div class="row">
                                      <div class="col-md-8">
                                          <h3>
                                              <i class="nav-icon fas fa-edit"> </i>
                                            RegisterX
                                          </h3>
                                      </div>
                                  </div>
                              </div>


                    <div class="card-body">
                        <div class="container-fluid" style="background: #e3eee5">
                            <div class="row justify-content-center">
                                <div class="col-md-8" >

                                    <!-- bsams tabs -->
                                    <div class="tabs-wrapper"  >
                                        <ul class="nav nav-tabs nav-justified">


                                            <li class="nav-item">
                                                <a class="nav-link" href="#">
                                                    <i class="fa fa-building" aria-hidden="true"></i>

                                                    Report
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="#">
                                                    <i class="fa fa-building" aria-hidden="true"></i>

                                                    Notification
                                                </a>
                                            </li>

                                        </ul>
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
   @endsection
