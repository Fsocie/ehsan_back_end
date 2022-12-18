@extends('backend.layouts.app')

    @section('button')

    @endsection

	@section('page')
	    Ajout de Support
	@endsection



@section('content')


    <form method="POST"  action="{{route('supports.store')}}">
        @csrf

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <input type="text" name="nom_support" value="{{old('nom_support')}}" class="form-control @error('nom_support') is-invalid @enderror" id="" placeholder="Nom du support">
                            @error('nom_support')
                                <div class="invalid-feedback">
                                    {{$errors->first('nom_support')}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                    
                    
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Valider</button>
    </form>

@endsection

@section('custum_js')
<script>
  
</script>
@endsection

