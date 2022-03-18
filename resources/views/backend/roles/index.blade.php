@extends('backend.layouts.app')

	@section('page')
		Roles
	@endsection



	@section('content')


        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">

                        <div class="float-left">
                            <p class="lead">
                                <i class="fa fa-globe-africa"></i>
                                <strong> Liste des roles </strong>
                            </p>
                        </div>
                        <div class="float-right">
                            <p class="lead">
                                @can('role-create')
                                    <a type="button" class="btn btn-success " href="{{route('roles.create')}}">Ajouter </a>
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
                                @forelse($roles as $role)

                                    <tr >
                                        <td>{{ ++$i }}</td>
                                        <td>{{$role->name}}</td>      
                                        <td>
                                            <div class="">
                                                <div class="d-flex" style="justify-content: space-between">
                                                    <a type="button" class="btn btn-secondary btn-sm" href="{{ route('roles.assign.permission',$role->id) }}" title="assigner permission">assign Permission</a>
                                                    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default{{$role->id}}" href="{{ route('roles.show', $role->id) }}" title="Editer" ><i class="nav-icon fas fa-eye"></i></a>
                                                    @can('role-edit')
                                                        <a type="button" class="btn btn-warning" href="{{ route('roles.edit', $role->id) }}" title="Editer" ><i class="nav-icon fas fa-edit"></i></a>
                                                    @endcan
                                                    @can('role-delete')
                                                        <button class="btn btn-danger start_chat" data-toggle="modal" data-target="#modal-danger{{$role->id}}" title="delete"><i class="fas fa-trash"></i></button>
                                                    @endcan
                                                </div>

                                             </div>
                                        </td>
                                    </tr>

                               
                                    @include('backend.roles.delete')
                                    @include('backend.roles.view')
                                @empty
                                    <tr class="text-danger text-center"><td>Pas de roles disponibles</td></tr>
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





