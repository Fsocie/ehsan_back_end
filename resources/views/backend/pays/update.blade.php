@extends('backend.layouts.app')

    @section('button')

    @endsection

	@section('page')
		Mise à jour
	@endsection



	@section('content')


   <form method="POST" action="{{route('admin.pays.update')}}" >
        @csrf

        <div class="form-group ">
            <div class="form-group ">
                <input type="text" name="nom" class="form-control" value="{{ $pays->nom }}" id="nom" >
            </div>

            <div class="form-group ">
                <input type="text" name="abr" class="form-control" value="{{ $pays->abr }}" id="abr" >
            </div>

            <div class="form-group ">
                <input type="text" name="indicatif"class="form-control" value="{{ $pays->indicatif }}" id="indicatif" placeholder="indicatif">
            </div>



        </div>

        <button type="submit" name="submit" class="btn btn-primary"> Valider </button>
    </form>

@endsection

