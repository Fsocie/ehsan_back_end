@extends('backend.layouts.app')

    @section('button')

    @endsection

	@section('page')
	    Ajout des Enfants de Bénéficiaires
	@endsection



@section('content')


    <form method="POST" action="{{route('admin.enfant.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <!--PARENTS BEGIN-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group ">
                            <label for="">Nom</label>
                            <input type="text" name="nom" value="{{old('nom')}}" class="form-control @error('nom') is-invalid @enderror" id="" placeholder="nom de l'enfant">
                            @error('nom')
                                <div class="invalid-feedback">
                                    {{$errors->first('nom')}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group ">
                            <label for="">Prenoms</label>
                            <input type="text" name="prenom" value="{{old('prenom')}}" class="form-control @error('prenom') is-invalid @enderror" id="" placeholder="Prenom de l'enfant">
                            @error('prenom')
                                <div class="invalid-feedback">
                                    {{$errors->first('prenom')}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group ">
                            <label for="">Date de Naissance</label>
                            <input type="date" name="date_naissance" value="{{old('date_naissance')}}" class="form-control @error('date_naissance') is-invalid @enderror" id="" placeholder="Date de naissance de l'enfant">
                            @error('date_naissance')
                                <div class="invalid-feedback">
                                    {{$errors->first('date_naissance')}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group ">
                            <label for="">Photo</label>
                            <input type="file" name="photo" value="{{old('photo')}}" class="form-control @error('photo') is-invalid @enderror" id="" placeholder="Imgae de l'enfant">
                            @error('photo')
                                <div class="invalid-feedback">
                                    {{$errors->first('photo')}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <!--PARENTS END-->
            <hr>
            <!--CARNET DE SANTE BEGIN-->
            <div class="row">
                <div class="col-md-6">
                    
                        <select name="user_id" id="" class="form-control">
                            @forelse ($utilisateurs as $item)
                                <option value="{{$item->id}}">{{$item->nom}} {{$item->prenoms}}</option>
                            @empty
                                <p>Pas de Parents disponibles...</p>
                            @endforelse
                        </select>
                   
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group ">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description de l'enfant" id="" cols="5" rows="2">{{old('description')}}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{$errors->first('description')}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <!--CARNET DE SANTE END-->
            
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Valider</button>
    </form>

@endsection


