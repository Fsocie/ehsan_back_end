@extends('backend.layouts.app')

	@section('page')
		WhatsApp
	@endsection



	@section('content')


        <div class="row">
            <div class="col-lg-12">
                {{--<div class="card">

                    <div class="card-header">

                        <div class="float-left">
                            <p class="lead">
                                <i class="fa fa-globe-africa"></i>
                                <strong> Liste des users </strong>
                            </p>
                        </div>
                        <div class="float-right">
                            <p class="lead">
                                @can('user-create')
                                    <a type="button" class="btn btn-success " href="">Ajouter </a>
                                @endcan
                            </p>
                        </div>

                    </div>


                    <!-- /.card-header -->

                    <div class="card-body">
                        @if ($message = Session::get('success'))

                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                {{ $message }}
                            </div>
                        @endif
                        <div id="user_model_details"></div>


                    </div>

                </div>--}}
                <iframe class="col-lg-12" style="height: 70vh;border: none " src="https://web.whatsapp.com"  allowfullscreen sandbox></iframe>

            </div>
        </div>

     

    @endsection

    @section('javascripts')

        <script type="text/javascript">
            $(document).ready(function(){

                $("#listLots").DataTable({
                  "responsive": true,
                  "autoWidth": false,
                });
            })
            function setLotId(id) {

                $('#lot_id').val(id);
            }

            $(document).ready(function(){

                $("#dataUsers").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            })

        </script>

    @endsection





