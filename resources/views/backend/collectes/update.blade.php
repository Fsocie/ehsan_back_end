@extends('backend.layouts.app')

    @section('button')

    @endsection

	@section('page')
	    Mise a jour de collectes
	@endsection



@section('content')


   <form method="POST" action="{{route('admin.collectes.update',$collecte->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="form-group ">

            <div class="form-group ">
                <input type="text" name="titre" value="{{old('titre')?? $collecte->titre}}" class="form-control  @error('titre') is-invalid @enderror" id="">
                @error('titre')
                    <div class="invalid-feedback">
                        {{$errors->first('titre')}}
                    </div>
                @enderror
            </div>

            <div class="form-group ">
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" value="{{old('description')?? $collecte->description}}" id="" cols="30" rows="3">
                    {{old('description')?? $collecte->description}}
                </textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{$errors->first('description')}}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <input type="file" name="image" value="{{$collecte->image}}" id="image" onchange="loadFile(event)" class="form-control @error('image') is-invalid @enderror" placeholder="image de la collecte">
                @error('image')
                    <div class="invalid-feedback">
                        {{$errors->first('image')}}
                    </div>
                @enderror
            </div>
            <div >
                <img id ="output" src="{{Storage::url($collecte->image)}}" style="border: 2px solid gray;border-radius:5px;width:200px;height:200px">
            </div>

        </div>
        <button type="submit" name="submit" class="btn btn-primary">Mettre à jour</button>
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

