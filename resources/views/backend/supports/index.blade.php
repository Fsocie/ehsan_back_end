@extends('backend.layouts.app')

	@section('page')
		Les Differentes Type de Support
	@endsection



	@section('content')


        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">

                        <div class="float-left">
                            <p class="lead">
                                <i class="fa fa-globe-africa"></i>
                                <strong> Type de Support </strong>
                            </p>
                        </div>
                        <div class="float-right">
                            <p class="lead">
                                <a type="button" class="btn btn-success " href="{{route('supports.create')}}">Ajouter </a>
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
                                    <th>Nom du support</th>
                                    <th>Ajouté le</th>
                                    <th>Action</th>
                                </tr>

                            </thead>

                            <tbody>
                                @php ($i = 0)
                                @foreach($supports as $support)

                                    <tr>
                                        <th>{{ ++$i }}</th>
                                        <th> {{$support->nom_support}}</th>
                                        <th> {{$support->created_at}}</th>
                                        <th>
                                            <div class="">
                                                <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default{{$support->id}}" href="{{ route('supports.show', $support->id) }}" title="Voire" ><i class="nav-icon fas fa-eye"></i></a>
                                                <a type="button" class="btn btn-success btn-sm" href="{{ route('supports.edit', $support->id) }}" title="Editer" ><i class="nav-icon fas fa-pen"></i></a>
                                                <a type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger{{$support->id}}"  href="{{ route('supports.destroy',$support->id) }}" title="Supprimer" ><i class="nav-icon fas fa-trash"></i></a>
                                             </div>
                                        </th>
                                    </tr>
                                    @include('backend.supports.delete')
                                    @include('backend.supports.show')
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





