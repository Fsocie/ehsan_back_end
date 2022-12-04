@extends('backend.layouts.app')

	@section('page')
		Users
	@endsection



	@section('content')


        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">

                        <div class="float-left">
                            <p class="lead">
                                <i class="fa fa-globe-africa"></i>
                                <strong> Liste des Utilisateurs </strong>
                            </p>
                        </div>
                        <div class="float-right">
                            <p class="lead">
                                @can('user-create')
                                    <a type="button" class="btn btn-success " href="{{route('users.create')}}">Ajouter </a>
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
                                    <th>Prenom</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Action</th>
                                </tr>

                            </thead>

                            <tbody>
                                @php ($i = 0)
                                @forelse($utilisateurs as $user)

                                    <tr >
                                        <td>{{ ++$i }}</td>
                                        <td>{{$user->nom}}</td>     
                                        <td>{{$user->prenoms}}</td>  
                                        <td>{{$user->email}}</td>  
                                        <td>{{$user->role_name}}</td>
                                        <td>
                                            <div class="">
                                                <div class="d-flex" style="justify-content: space-between">
                                                    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default{{$user->id}}" href="{{ route('users.show', $user->id) }}" title="Voire" ><i class="nav-icon fas fa-eye"></i></a>
                                                    @can("user-edit")
                                                        {{--<a type="button" class="btn btn-warning" href="{{ route('users.edit', $user->id) }}" title="Editer" ><i class="nav-icon fas fa-edit"></i></a>--}}
                                                    @endcan
                                                    @can("user-delete")
                                                        <button class="btn btn-danger start_chat" data-toggle="modal" data-target="#modal-danger{{$user->id}}" title="delete"><i class="fas fa-trash"></i></button>
                                                    @endcan
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                               
                                    @include('backend.users.delete')
                                    @include('backend.users.view')
                                @empty
                                    <tr class="text-danger text-center"><td>Pas de users disponibles</td></tr>
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





