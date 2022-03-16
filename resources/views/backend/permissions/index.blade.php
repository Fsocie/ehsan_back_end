@extends('backend.layouts.app')

	@section('page')
		Permissions
	@endsection



	@section('content')


        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">

                        <div class="float-left">
                            <p class="lead">
                                <i class="fa fa-globe-africa"></i>
                                <strong> Liste des permissions </strong>
                            </p>
                        </div>
                        <div class="float-right">
                            <p class="lead">
                             
                                <a type="button" class="btn btn-success " href="{{route('permissions.create')}}">Ajouter </a>
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
                                    <th>Nom</th>
                                    <th>Action</th>
                                </tr>

                            </thead>

                            <tbody>
                                @php ($i = 0)
                                @forelse($permissions as $permission)

                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{$permission->name}}</td>      
                                        <td>
                                            <div class="">
                                                <div class="d-flex" style="justify-content: space-between">
                                                    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default{{$permission->id}}" href="{{ route('permissions.show', $permission->id) }}" title="Voire" ><i class="nav-icon fas fa-eye"></i></a>
                                                    <a type="button" class="btn btn-warning" href="{{ route('permissions.edit', $permission->id) }}" title="Editer"><i class="nav-icon fas fa-edit"></i></a>
                                                    <button class="btn btn-danger start_chat" data-toggle="modal" data-target="#modal-danger{{$permission->id}}" title="delete"><i class="fas fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('backend.permissions.delete')
                                    @include('backend.permissions.view')
                                @empty
                                    <tr class="text-danger text-center"><td>Pas de permissions disponibles</td></tr>
                                @endforelse
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





