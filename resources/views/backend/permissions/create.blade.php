@extends('backend.layouts.app')

    @section('button')

    @endsection

	@section('page')
	    Ajout de roles
	@endsection



@section('content')


    <form method="POST"  action="{{route('permissions.store')}}">
        @csrf

            <div class="form-group">
                    <div class="form-group">
                        <input type="text" name="name" value="" class="form-control @error('name') is-invalid @enderror" id="" placeholder="nom de la permission">
                        @error('name')
                            <div class="invalid-feedback">
                                {{$errors->first('name')}}
                            </div>
                        @enderror
                    </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Valider</button>
    </form>

@endsection


