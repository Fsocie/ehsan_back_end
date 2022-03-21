@extends('backend.layouts.app')

    @section('button')

    @endsection

	@section('page')
	    Mise a jour d'un utilisateur
	@endsection



@section('content')


   <form method="POST" action="{{route('users.update',$user->id)}}">
    @csrf
    @method('PUT')
        <div class="form-group">

             <div class="form-group">
                    <div class="form-group ">
                        <input type="text" name="nom" value="{{old('nom')?? $user->nom}}" class="form-control @error('nom') is-invalid @enderror" id="" placeholder="nom de l'utilisateur">
                        @error('nom')
                            <div class="invalid-feedback">
                                {{$errors->first('nom')}}
                            </div>
                        @enderror
                    </div>
            </div>
            <!---->
            <div class="form-group">
                    <div class="form-group ">
                        <input type="text" name="prenoms" value="{{old('prenoms')?? $user->prenoms}}" class="form-control @error('prenoms') is-invalid @enderror" id="" placeholder="prenoms de l'utilisateur">
                        @error('prenoms')
                            <div class="invalid-feedback">
                                {{$errors->first('prenoms')}}
                            </div>
                        @enderror
                    </div>
            </div>
            <!---->
            <div class="form-group">
                    <div class="form-group ">
                        <input type="text" name="telephone" value="{{old('telephone')?? $user->telephone}}" class="form-control @error('telephone') is-invalid @enderror" id="" placeholder="telephone de l'utilisateur">
                        @error('telephone')
                            <div class="invalid-feedback">
                                {{$errors->first('telephone')}}
                            </div>
                        @enderror
                    </div>
            </div>
            <!---->
            <div class="form-group">
                    <div class="form-group ">
                        <input type="email" name="email" value="{{old('email')?? $user->email}}" class="form-control @error('email') is-invalid @enderror" id="" placeholder="email de l'utilisateur">
                        @error('email')
                            <div class="invalid-feedback">
                                {{$errors->first('email')}}
                            </div>
                        @enderror
                    </div>
            </div>
            <!---->
            {{--<div class="form-group">
                <label>Roles</label>
                    <select class="form-control" name="role_id">
                        @forelse ($roles as $role)
                            <option value="{{$role->id}}" @if($role->id===$user->role_id) selected @endif>{{$role->name}}</option>
                        @empty  
                            <p>Pas de roles disponible</p>
                        @endforelse
                    </select>
            </div>--}}
            <div class="form-group ml-5">
                @foreach($roles as $role)
                            <div class="form-group">
                                <input 
                                type="checkbox" 
                                class="form-check-input" 
                                value="{{$role->id}}" 
                                name="roles[]" 

                                @foreach($user->roles as $userRole) 
                                    @if($userRole->id === $role->id)
                                        checked
                                    @endif
                                @endforeach
                                >
                                <label for="" class="form-check-label">{{$role->name}}</label>

                            </div>
                @endforeach
            </div>

        </div>
        <button type="submit" name="submit" class="btn btn-primary">Mettre à jour</button>
    </form>

@endsection


