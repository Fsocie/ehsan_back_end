@extends('backend.layouts.app')

    @section('linkCss')
        <!-- BS Stepper -->
        <link rel="stylesheet" href="{{ asset('admin/plugins/bs-stepper/css/bs-stepper.min.css') }}">
    @endsection

	@section('page')
	    Mettre à jour un Parent
	@endsection



@section('content')


    <form method="POST" action="{{route('admin.beneficiaire.update',$user->id)}}">
        @method('PUT')
        @csrf

        <div class="form-group">
            <!--PARENTS BEGIN-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group ">
                            <label for="">Nom</label>
                            <input type="text" name="nom" value="{{$user->nom}}" class="form-control @error('nom') is-invalid @enderror" id="" placeholder="Nom...">
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
                            <input type="text" name="prenoms" value="{{$user->prenoms}}" class="form-control @error('prenoms') is-invalid @enderror" id="" placeholder="Prenoms...">
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
                            <input type="text" name="profession" value="{{$user->profession}}" class="form-control @error('profession') is-invalid @enderror" id="" placeholder="Projet Professionnel...">
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
                            <input type="date" name="date_naissance" value="" class="form-control @error('date_naissance') is-invalid @enderror" id="" placeholder="Date de naissance...">
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
                            <input type="email" name="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror" id="" placeholder="Email...">
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
                                <input type="text" name="telephone" value="{{$user->telephone}}" class="form-control @error('telephone') is-invalid @enderror" id="" placeholder="Telephone 1...">
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
                                <input type="text" name="telephone2" value="{{$user->telephone2}}" class="form-control @error('telephone2') is-invalid @enderror" id="" placeholder="Telephone 2...">
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
            <!--PARENTS END-->
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="form-group ">
                            <label for="">Pays</label>
                            <input type="text" name="pays" value="{{$user->pays}}" class="form-control @error('pays') is-invalid @enderror" id="" placeholder="Pays...">
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
                            <input type="text" name="region" value="{{$user->region}}" class="form-control @error('region') is-invalid @enderror" id="" placeholder="Region...">
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
                            <input type="text" name="ville" value="{{$user->ville}}" class="form-control @error('ville') is-invalid @enderror" id="" placeholder="Ville...">
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
                            <input type="text" name="village" value="{{$user->village}}" class="form-control @error('village') is-invalid @enderror" id="" placeholder="village...">
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
            <h3 class="text-center">PERSONNES  A PREVENIR</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="">Nom</label>
                                <input type="text" name="nom_personne1" value="{{$user->nom_personne1}}" class="form-control @error('nom_personne1') is-invalid @enderror" id="" placeholder="Nom personne1...">
                                @error('nom_personne1')
                                    <div class="invalid-feedback">
                                        {{$errors->first('nom_personne1')}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group ">
                                <label for="">Prenom</label>
                                <input type="text" name="prenom_personne1" value="{{$user->prenom_personne1}}" class="form-control @error('prenom_personne1') is-invalid @enderror" id="" placeholder="Prenom personne1...">
                                @error('prenom_personne1')
                                    <div class="invalid-feedback">
                                        {{$errors->first('prenom_personne1')}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group ">
                                <label for="">Contact</label>
                                <input type="text" name="telephone_personne1" value="{{$user->telephone_personne1}}" class="form-control @error('telephone_personne1') is-invalid @enderror" id="" placeholder="Contact personne1...">
                                @error('telephone_personne1')
                                    <div class="invalid-feedback">
                                        {{$errors->first('telephone_personne1')}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="">Nom</label>
                                <input type="text" name="nom_personne2" value="{{$user->nom_personne1}}" class="form-control @error('nom_personne2') is-invalid @enderror" id="" placeholder="Nom personne2...">
                                @error('nom_personne2')
                                    <div class="invalid-feedback">
                                        {{$errors->first('nom_personne2')}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group ">
                                <label for="">Prenom</label>
                                <input type="text" name="prenom_personne2" value="{{$user->prenom_personne2}}" class="form-control @error('prenom_personne2') is-invalid @enderror" id="" placeholder="Prenom personne2...">
                                @error('prenom_personne2')
                                    <div class="invalid-feedback">
                                        {{$errors->first('prenom_personne2')}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group ">
                                <label for="">Contact</label>
                                <input type="text" name="telephone_personne2" value="{{$user->telephone_personne2}}" class="form-control @error('telephone_personne2') is-invalid @enderror" id="" placeholder="Contact personne2...">
                                @error('telephone_personne2')
                                    <div class="invalid-feedback">
                                        {{$errors->first('telephone_personne2')}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="">Nom</label>
                                <input type="text" name="nom_personne3" value="{{$user->nom_personne3}}" class="form-control @error('nom_personne3') is-invalid @enderror" id="" placeholder="Nom personne3...">
                                @error('nom_personne3')
                                    <div class="invalid-feedback">
                                        {{$errors->first('nom_personne3')}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group ">
                                <label for="">Prenom</label>
                                <input type="text" name="prenom_personne3" value="{{$user->prenom_personne3}}" class="form-control @error('prenom_personne3') is-invalid @enderror" id="" placeholder="Prenom personne3...">
                                @error('prenom_personne3')
                                    <div class="invalid-feedback">
                                        {{$errors->first('prenom_personne3')}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group ">
                                <label for="">Contact</label>
                                <input type="text" name="telephone_personne3" value="{{$user->telephone_personne3}}" class="form-control @error('telephone_personne3') is-invalid @enderror" id="" placeholder="Contact personne3...">
                                @error('telephone_personne3')
                                    <div class="invalid-feedback">
                                        {{$errors->first('telephone_personne3')}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            <hr>
            <div class="form-group">
                <h3 class="text-center">TYPES DE SUPPORT</h3>
                <div class="row">
                    <div class="col-md-3">
                        <label><input type="checkbox" name="supports[]" value="CARTE"> CARTE</label>
                    </div>
                    <div class="col-md-3">
                        <label><input type="checkbox" name="supports[]" value="COLIER"> COLIER</label>
                    </div>
                    <div class="col-md-3">
                        <label><input type="checkbox" name="supports[]" value="PORTE CLE"> PORTE CLE</label>
                    </div>
                    <div class="col-md-3">
                        <label><input type="checkbox" name="supports[]" value="BRACELET"> BRACELET</label>
                    </div>
                </div>
            </div> 
            <hr>
            <!--CARNET DE SANTE BEGIN-->
            <h3 class="text-center">INFORMATIONS DE SANTE</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group ">
                            <label for="">Antecedent</label>
                            <input type="text" name="antecedent" value="{{$user->antecedent}}" class="form-control @error('antecedent') is-invalid @enderror" id="" placeholder="Antecedent...">
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
                            <input type="number" name="poids" value="{{$user->poids}}" class="form-control @error('poids') is-invalid @enderror" id="" placeholder="Poids...">
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
                            <input type="number" name="taille" value="{{$user->taille}}" class="form-control @error('taille') is-invalid @enderror" id="" placeholder="Taille...">
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
                            <input type="text" name="groupe" value="{{$user->groupe}}" class="form-control @error('groupe') is-invalid @enderror" id="" placeholder="Groupe sanguin...">
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
                            <input type="text" name="vaccination" value="{{$user->vaccination}}" class="form-control @error('vaccination') is-invalid @enderror" id="" placeholder="Vaccination...">
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
                            <textarea name="allergie" class="form-control @error('allergie') is-invalid @enderror" placeholder="Les allergies..." id="" cols="5" rows="2">{{$user->allergie}}</textarea>
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
                            <textarea name="maladie" class="form-control @error('maladie') is-invalid @enderror" placeholder="Les maladies..." id="" cols="5" rows="2">{{$user->maladie}}</textarea>
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

        <button type="submit" name="submit" class="btn btn-primary">Mettre à jour</button>
    </form>

@endsection


@section('javascripts')
<script>
    /*$(".btn-submit").click(function(e){

                e.preventDefault();

                var data = $(this).serialize();
                console.log(data);
                var url = '{{ url('ajouterBeneficiaire') }}';
                $(document).find("span.text-danger").remove();
                $.ajax({
                url:url,
                method:'POST',
                data:data,
                success:function(response){
                    if(response.success){
                        alert(response.message) //Message come from controller
                    }else{
                        alert("Error")
                    }
                },
                error:function(response){
                    console.log("valeur de response:",response)
                    $.each(response.responseJSON.errors,function(field_name,error){
                        $(document).find('[name='+field_name+']').after('<span class="text-strong text-danger">' +error+ '</span>')
                    })
                }
                });
    });*/
</script>

@endsection


