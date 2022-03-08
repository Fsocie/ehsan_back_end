@extends('backend.layouts.app')

	@section('page')
		Carnet Utilisateur
	@endsection



	@section('content')


        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">

                        <div class="float-left">
                            <p class="lead">
                                <i class="fa fa-globe-africa"></i>
                                <strong> Carnet de santé </strong>
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

                        <table id="listLots" class="table table-bordered table-striped">
                            <thead>

                                <tr>
                                    <th>No</th>
                                    <th>Utilisateur</th>
                                    <th>Antécédents</th>
                                    <th>Interdiction </th>
                                    <th>Action</th>
                                </tr>

                            </thead>

                            <tbody>
                                @php ($i = 0)
                                @foreach($carnet as $carnet)

                                    <tr >

                                        <th>
                                            {{ ++$i }}
                                        </th>
                                        <th >
                                        @foreach ($carnet->user as $object)
                                            {{ $object->nom }}  {{ $object->prenoms }}
                                          @endforeach

                                        </th>
                                        <th>
                                            {{$carnet->antecedents}}
                                        </th>
                                        <th>
                                            {{$carnet->interdiction}}
                                        </th>

                                        <th>

                                            <div class="btn-group">

                                                  <a type="button" class="btn btn-primary" href="{{ route('admin.carnet.show', $carnet->id) }}" title="Détails" ><i class="nav-icon fas fa-eye"></i></a>


                                             </div>

                                        </th>

                                    </tr>

                                @endforeach
                            </tbody>

                        </table>

                    </div>

                </div>
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





