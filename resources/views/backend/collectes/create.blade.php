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
                        <input type="text" name="titre" class="form-control" id="" placeholder="Titre de la collecte">
                    </div>

                    <div class="form-group ">
                        <input type="text" name="description"class="form-control" id="" placeholder="Description de la collecte">
                    </div>

                    <div class="form-group">
                        <input type="file" name="image" id="image" onchange="loadFile(event)" class="form-control" placeholder="image de la collecte">
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

