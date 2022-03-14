@extends('backend.layouts.app')

    @section('button')

    @endsection

	@section('page')
	    Ajout de collectes
	@endsection



@section('content')


    <form method="POST"  action="{{route('admin.collectes.store')}}" enctype="multipart/form-data">
        @csrf

            <div class="form-group">
                    <div class="form-group ">
                        <input type="text" name="titre" value="" class="form-control @error('titre') is-invalid @enderror" id="" placeholder="Titre de la collecte">
                        @error('titre')
                            <div class="invalid-feedback">
                                {{$errors->first('titre')}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <textarea name="description" value="Description de la collecte" class="form-control @error('description') is-invalid @enderror" id="" cols="30" rows="4"></textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{$errors->first('description')}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="file" name="image" id="image" onchange="loadFile(event)" class="form-control @error('image') is-invalid @enderror" placeholder="image de la collecte">
                        @error('image')
                            <div class="invalid-feedback">
                                {{$errors->first('image')}}
                            </div>
                        @enderror
                    </div>
                    <div >
                        <img id ="output" style="border: 2px solid gray;border-radius:5px;width:200px;height:200px">
                    </div>
                    
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Valider</button>
    </form>

@endsection

@section('custum_js')
<script>
    var loadFile = (event)=>{
      
        var output = document.querySelector("#output");
        output.src = URL.createObjectURL(event.target.files[0]);
    }
   
</script>
@endsection

