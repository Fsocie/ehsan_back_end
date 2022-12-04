@extends('backend.layouts.app')

    @section('button')

    @endsection

	@section('page')
	    Ajout de Parents
	@endsection



@section('content')


    <form method="POST" action="{{route('admin.beneficiaire.store')}}">
        @csrf
        <div class="form-group">
            <!--PARENTS BEGIN-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group ">
                            <label for="">Nom</label>
                            <input type="text" name="nom" value="{{old('nom')}}" class="form-control @error('nom') is-invalid @enderror" id="" placeholder="nom du bénéficiaire">
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
                            <input type="text" name="prenoms" value="{{old('prenoms')}}" class="form-control @error('prenoms') is-invalid @enderror" id="" placeholder="Prenoms du bénéficiaire">
                            @error('prenoms')
                                <div class="invalid-feedback">
                                    {{$errors->first('prenoms')}}
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
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" id="" placeholder="Email du bénéficiaire">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$errors->first('email')}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group ">
                            <label for="">Telephone</label>
                            <input type="text" name="telephone" value="{{old('telephone')}}" class="form-control @error('telephone') is-invalid @enderror" id="" placeholder="Telephone du bénéficiaire">
                            @error('telephone')
                                <div class="invalid-feedback">
                                    {{$errors->first('telephone')}}
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
                    <div class="form-group">
                        <div class="form-group ">
                            <label for="">Antecedent</label>
                            <input type="text" name="antecedent" value="{{old('antecedent')}}" class="form-control @error('antecedent') is-invalid @enderror" id="" placeholder="Antecedent du bénéficiaire">
                            @error('antecedent')
                                <div class="invalid-feedback">
                                    {{$errors->first('antecedent')}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group ">
                            <label for="">Genre</label>
                            <select name="sexe" class="form-control @error('sexe') is-invalid @enderror" id="">
                                <option value="M">Masculin</option>
                                <option value="F">Feminin</option>
                            </select>
                            @error('sexe')
                                <div class="invalid-feedback">
                                    {{$errors->first('sexe')}}
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
                            <label for="">Poids</label>
                            <input type="number" name="poids" value="{{old('poids')}}" class="form-control @error('poids') is-invalid @enderror" id="" placeholder="Poids du bénéficiaire">
                            @error('poids')
                                <div class="invalid-feedback">
                                    {{$errors->first('poids')}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group ">
                            <label for="">Taille</label>
                            <input type="number" name="taille" value="{{old('taille')}}" class="form-control @error('taille') is-invalid @enderror" id="" placeholder="Taille du bénéficiaire">
                            @error('taille')
                                <div class="invalid-feedback">
                                    {{$errors->first('taille')}}
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
                            <label for="">Groupe Sanguin :(Ex: O+,O-,A+,A-,AB)</label>
                            <input type="text" name="groupe" value="{{old('groupe')}}" class="form-control @error('groupe') is-invalid @enderror" id="" placeholder="Groupe sanguin du Bénéficiaire">
                            @error('groupe')
                                <div class="invalid-feedback">
                                    {{$errors->first('groupe')}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group ">
                            <label for="">Vaccination</label>
                            <input type="text" name="vaccination" value="{{old('vaccination')}}" class="form-control @error('vaccination') is-invalid @enderror" id="" placeholder="Vaccination du bénéficiaire">
                            @error('vaccination')
                                <div class="invalid-feedback">
                                    {{$errors->first('vaccination')}}
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
                            <label for="">Allergie</label>
                            <textarea name="allergie" class="form-control @error('allergie') is-invalid @enderror" placeholder="Les allergie du bénéficiaire.." id="" cols="5" rows="2">{{old('allergie')}}</textarea>
                            @error('allergie')
                                <div class="invalid-feedback">
                                    {{$errors->first('allergie')}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group ">
                            <label for="">Maladie</label>
                            <textarea name="maladie" class="form-control @error('maladie') is-invalid @enderror" placeholder="Les maladie du bénéficiaire" id="" cols="5" rows="2">{{old('maladie')}}</textarea>
                            @error('maladie')
                                <div class="invalid-feedback">
                                    {{$errors->first('maladie')}}
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


