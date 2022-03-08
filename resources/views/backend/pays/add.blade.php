@extends('backend.layouts.app')

    @section('button')

    @endsection

	@section('page')
	Ajout Pays
	@endsection



	@section('content')


   <form method="POST" action="{{route('admin.pays.store')}}" >
    @csrf

     <div class="form-group">


         <div class="form-group ">

                <div class="form-group ">
                    <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom pays ">
                </div>

                <div class="form-group ">
                    <input type="text" name="abr"class="form-control" id="abr" placeholder="abréviation">
                </div>

                <div class="form-group">

                <input type="text" name="indicatif"class="form-control" id="indicatif" placeholder="indicatif">



                </div>

        </div>
            <button type="submit" name="submit" class="btn btn-primary">Valider</button>
    </form>

@endsection

