@extends('backend.layouts.app')

    @section('button')

    @endsection

	@section('page')
	    Ajout de roles
	@endsection



@section('content')


    <form method="POST"  action="{{route('roles.store')}}">
        @csrf
   
            <div class="form-group">
                    <div class="form-group ">
                        <input type="text" name="name" value="" class="form-control @error('name') is-invalid @enderror" id="" placeholder="nom du role">
                        @error('name')
                            <div class="invalid-feedback">
                                {{$errors->first('name')}}
                            </div>
                        @enderror
                    </div>
            </div>

            <div class="form-group ml-5">
                @foreach($permissions as $permission)
                            <div class="form-group">
                                <input 
                                type="checkbox" 
                                class="form-check-input" 
                                value="{{$permission->id}}" 
                                name="permission[]" 

                          
                                >
                                <label for="" class="form-check-label">{{$permission->name}}</label>

                            </div>
                @endforeach
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Valider</button>
    </form>

@endsection


