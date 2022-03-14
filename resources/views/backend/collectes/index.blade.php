@extends('backend.layouts.app')

	@section('page')
		Collectes
	@endsection



	@section('content')


        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">

                        <div class="float-left">
                            <p class="lead">
                                <i class="fa fa-globe-africa"></i>
                                <strong> Liste des collectes </strong>
                            </p>
                        </div>
                        <div class="float-right">
                            <p class="lead">
                             
                                <a type="button" class="btn btn-success " href="{{route('admin.collectes.create')}}">Ajouter </a>
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
                                    <th>Titre</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>

                            </thead>

                            <tbody>
                                @php ($i = 0)
                                @forelse($collectes as $collecte)

                                    <tr >
                                        <td>{{ ++$i }}</td>
                                        <td>{{$collecte->titre}}</td>
                                        <td><img style="border-radius: 5px;height:50px;width:50px" src="{{Storage::url($collecte->image)}}" alt="" srcset=""></td>
                                        <td>{{$collecte->description}}</td>
                                        <td>
                                            <div class="">
                                                <div class="d-flex" style="justify-content: space-between">
                                                    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default{{$collecte->id}}" href="{{ route('admin.collectes.show', $collecte->id) }}" title="Editer" ><i class="nav-icon fas fa-eye"></i></a>
                                                    <a type="button" class="btn btn-warning" href="{{ route('admin.collectes.edit', $collecte->id) }}" title="Editer" ><i class="nav-icon fas fa-edit"></i></a>
                                                    <button class="btn btn-danger start_chat" data-toggle="modal" data-target="#modal-danger{{$collecte->id}}" title="delete"><i class="fas fa-trash"></i></button>
                                                </div>

                                             </div>
                                        </td>
                                    </tr>

                               
                                    @include('backend.collectes.delete')
                                    @include('backend.collectes.view')
                                @empty
                                    <tr class="text-danger text-center"><td>Pas de collectes disponibles</td></tr>
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





