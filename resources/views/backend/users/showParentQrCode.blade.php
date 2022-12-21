@extends('backend.layouts.app')

	@section('page')
	 Code Qr
	@endsection



	@section('content')

    <section class="content">
        <div class="container-fluid">
             <!-- Timelime example  -->
            <div class="row">
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                        </button>
                        {{ $message }}
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <!--begin-->
                <div class="col-md-6">
                        <!---->
                        <div class="card card-widget">
                                    <!---->
                                    <div class="card-header">
                                        <div class="user-block">
                                            <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="">
                                            <span class="username"><a href="#">{{($parent->prenoms)}} {{($parent->nom)}}</a></span>
                                        </div>
                                
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" title="Mark as read">
                                                <i class="far fa-circle"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!---->
                                    <div class="card-body">
                                        <img class="img-fluid pad" src="{{asset($img_qrcode)}}" alt="Photo">
                                    </div>
                                 
                        </div>
                        <!---->
                </div>
                <!---->
            </div>
        </div>

    </section>



    @endsection

    @section('javascripts')

        <script type="text/javascript">
            
        </script>

    @endsection
