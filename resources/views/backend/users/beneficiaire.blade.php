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
                            <input type="text" name="nom" value="{{old('nom')}}" class="form-control @error('nom') is-invalid @enderror" id="" placeholder="Nom...">
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
                            <input type="text" name="prenoms" value="{{old('prenoms')}}" class="form-control @error('prenoms') is-invalid @enderror" id="" placeholder="Prenoms...">
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
                            <label for="">Projet Professionnel</label>
                            <input type="text" name="profession" value="{{old('profession')}}" class="form-control @error('profession') is-invalid @enderror" id="" placeholder="Projet Professionnel...">
                            @error('profession')
                                <div class="invalid-feedback">
                                    {{$errors->first('profession')}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group ">
                            <label for="">Date de Naisance</label>
                            <input type="date" name="date_naissance" value="{{old('date_naissance')}}" class="form-control @error('date_naissance') is-invalid @enderror" id="" placeholder="Date de naissance...">
                            @error('date_naissance')
                                <div class="invalid-feedback">
                                    {{$errors->first('date_naissance')}}
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
                            <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" id="" placeholder="Email...">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$errors->first('email')}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row col-md-6">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group ">
                                <label for="">Telephone-1</label>
                                <input type="text" name="telephone" value="{{old('telephone')}}" class="form-control @error('telephone') is-invalid @enderror" id="" placeholder="Telephone 1...">
                                @error('telephone')
                                    <div class="invalid-feedback">
                                        {{$errors->first('telephone')}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group ">
                                <label for="">Telephone-2</label>
                                <input type="text" name="telephone2" value="{{old('telephone2')}}" class="form-control @error('telephone2') is-invalid @enderror" id="" placeholder="Telephone 2...">
                                @error('telephone2')
                                    <div class="invalid-feedback">
                                        {{$errors->first('telephone2')}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                
                <div class="col-md-6">

                </div>
            </div>
            <!--PARENTS END-->
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="form-group ">
                            <label for="">Pays</label>
                            <input type="text" name="pays" value="{{old('pays')}}" class="form-control @error('pays') is-invalid @enderror" id="" placeholder="Pays...">
                            @error('pays')
                                <div class="invalid-feedback">
                                    {{$errors->first('pays')}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="form-group ">
                            <label for="">Region</label>
                            <input type="text" name="region" value="{{old('region')}}" class="form-control @error('region') is-invalid @enderror" id="" placeholder="Region...">
                            @error('region')
                                <div class="invalid-feedback">
                                    {{$errors->first('region')}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="form-group ">
                            <label for="">Ville/Prefecture</label>
                            <input type="text" name="ville" value="{{old('ville')}}" class="form-control @error('ville') is-invalid @enderror" id="" placeholder="Ville...">
                            @error('ville')
                                <div class="invalid-feedback">
                                    {{$errors->first('ville')}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="form-group ">
                            <label for="">Canton/Village</label>
                            <input type="text" name="village" value="{{old('village')}}" class="form-control @error('village') is-invalid @enderror" id="" placeholder="village...">
                            @error('village')
                                <div class="invalid-feedback">
                                    {{$errors->first('village')}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!--CARNET DE SANTE BEGIN-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group ">
                            <label for="">Antecedent</label>
                            <input type="text" name="antecedent" value="{{old('antecedent')}}" class="form-control @error('antecedent') is-invalid @enderror" id="" placeholder="Antecedent...">
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
                            <input type="number" name="poids" value="{{old('poids')}}" class="form-control @error('poids') is-invalid @enderror" id="" placeholder="Poids...">
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
                            <input type="number" name="taille" value="{{old('taille')}}" class="form-control @error('taille') is-invalid @enderror" id="" placeholder="Taille...">
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
                            <input type="text" name="groupe" value="{{old('groupe')}}" class="form-control @error('groupe') is-invalid @enderror" id="" placeholder="Groupe sanguin...">
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
                            <input type="text" name="vaccination" value="{{old('vaccination')}}" class="form-control @error('vaccination') is-invalid @enderror" id="" placeholder="Vaccination...">
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
                            <textarea name="allergie" class="form-control @error('allergie') is-invalid @enderror" placeholder="Les allergies..." id="" cols="5" rows="2">{{old('allergie')}}</textarea>
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
                            <textarea name="maladie" class="form-control @error('maladie') is-invalid @enderror" placeholder="Les maladies..." id="" cols="5" rows="2">{{old('maladie')}}</textarea>
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


