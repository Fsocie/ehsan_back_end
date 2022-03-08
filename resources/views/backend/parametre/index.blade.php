@extends('backend.layouts.app')

	@section('page')
		paramètre
	@endsection

	@section('content')

           <div class="row">
                <div class="col-12 col-sm-4 col-md-4s">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-flag"></i></span>

                            <div class="info-box-content">
                                    <a href="{{route('admin.pays.index')}}">
                                    <span class="info-box-text">Ajouter Pays</span>
                                    <span class="info-box-number">


                                    </span>
                                    </a>
                            </div>
                        <!-- /.info-box-content -->
                        </div>
                    <!-- /.info-box -->
                </div>
              <!-- /.col -->


              <div class="col-12 col-sm-4 col-md-4">
                    <div class="info-box mb-3">
                         <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                                <a href="">
                                <span class="info-box-text">Ajouter un type de cas</span>
                                <span class="info-box-number"> </span>
                                </a>
                        </div>
                             <!-- /.info-box-content -->
                    </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <div class="col-12 col-sm-4 col-md-4">
                    <div class="info-box mb-3">
                         <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                        <div class="info-box-content">
                                <a href="">
                                <span class="info-box-text">Listes des transactions</span>
                                <span class="info-box-number"> </span>
                                </a>
                        </div>
                             <!-- /.info-box-content -->
                    </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->


          </div>

    @endsection
