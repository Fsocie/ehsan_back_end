@extends('backend.layouts.app')

    @section('button')

    @endsection

	@section('page')
	    Mise a jour de permission
	@endsection



@section('content')


   <form method="POST" action="{{route('permissions.update',$permission->id)}}">
    @csrf
    @method('PUT')
        <div class="form-group ">

            <div class="form-group ">
                <input type="text" name="name" value="{{old('name')?? $permission->name}}" class="form-control  @error('name') is-invalid @enderror" id="">
                @error('name')
                    <div class="invalid-feedback">
                        {{$errors->first('name')}}
                    </div>
                @enderror
            </div>

        </div>
        <button type="submit" name="submit" class="btn btn-primary">Mettre à jour</button>
    </form>

@endsection


