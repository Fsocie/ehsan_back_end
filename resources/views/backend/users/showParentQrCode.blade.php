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
                {{--{{dd($enfant)}}--}}
                {{--{{dd($enfant->qrcode)}}--}}
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
                                        <img class="img-fluid pad" src="/codes-qr/junior.svg" alt="Photo">
                                        
                                        {{--<button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                                        <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                                        <span class="float-right text-muted">127 likes - 3 comments</span>--}}
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
