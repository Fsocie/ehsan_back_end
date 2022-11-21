@extends('backend.layouts.app')

	@section('page')
		Enfant & code Qr
	@endsection



	@section('content')

    <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">
                        <div class="float-left">
                            <p class="lead">
                                <i class="fa fa-globe-africa"></i>
                                <strong> Listes des enfants </strong>
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
                                    <th>Prenoms</th>
                                    <th>Date de naissance </th>
                                    <th>Parents </th>
                                     <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php ($i = 0)
                                @foreach($enfant as $enfant)
                                    <tr>
                                        <th>{{ ++$i }}</th>
                                        <th>{{$enfant->nom}}</th>
                                        <th>{{$enfant->prenom}}</th>
                                        <th>{{$enfant->date_naissance}}</th>
                                        <th>{{$enfant->user->nom}}   {{$enfant->user->prenoms}}</th>
                                        <th>
                                            <div class="btn-group">
                                                <a type="button" class="btn btn-warning" href="{{route('admin.qrcode.show', $enfant->id)}}" title="Qr code" ><i class="nav-icon fas fa-qrcode"></i></a>
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
         
        </script>

    @endsection





