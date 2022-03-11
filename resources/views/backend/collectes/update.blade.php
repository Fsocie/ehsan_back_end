@extends('backend.layouts.app')

    @section('button')

    @endsection

	@section('page')
	    Mise a jour de collectes
	@endsection



	@section('content')


   <form method="POST" action="{{route('admin.collectes.update',$collecte->id)}}" >
    @csrf
    @method('PUT')
     <div class="form-group">


         <div class="form-group ">

            <div class="form-group ">
                <input type="text" name="titre" value="{{old('titre')?? $collecte->titre}}" class="form-control" id="">
            </div>

            <div class="form-group ">
                <input type="text" name="description" value="{{old('description')?? $collecte->description}}" class="form-control" id="">
            </div>

            <div class="form-group">
                <input type="file" name="image" value="{{old('image')?? $collecte->image}}" id="image" onchange="loadFile(event)" class="form-control" placeholder="image de la collecte">
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

