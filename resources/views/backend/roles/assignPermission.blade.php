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
                                <strong> Assigner une permission au role: <strong>{{$role->name}}</strong></strong>
                            </p>
                        </div>
                        <div class="float-right">
                            <p class="lead">
                                <a type="button" class="btn btn-success " href="{{route('roles.index')}}">Tous les Roles </a>
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
                        <!---->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Permissions</h3>
                                </div>

                                    <div class="card-body">

                                    <form method="POST" action="{{route("roles.store.permission",$role->id)}}">
                                    @csrf
                                        <div class="row">
                                                <div class="col-sm-6">
                                                    @forelse ($permissions as $permission)
                                                        <div class="form-group">    
                                                            <div class="form-check">
                                                                <input class="form-check-input" 
                                                                name="permission[]" 
                                                                type="checkbox" 
                                                                value="{{$permission->id}}"
                                                                @if($role->hasPermissionTo($permission->id))
                                                                    checked
                                                                @endif>
                                                                <label class="form-check-label">{{$permission->name}}</label>
                                                            </div>
                                                        </div>
                                                        @empty
                                                        <p>Pas de permission Disponible pour le moment</p>
                                                        @endforelse
                                                </div>
                                        </div>
                                             <button type="submit" name="submit" class="btn btn-primary">Valider</button>
                                    </form>
                                </div>

                            </div>
                        <!---->
                        </div>

                </div>
            </div>
        </div>

     

    @endsection

    @section('javascripts')

    @endsection





