@extends('backend.layouts.app')

    @section('button')

    @endsection

	@section('page')
	    Ajout de users
	@endsection



@section('content')


    <form method="POST"  action="{{route('users.store')}}">
        @csrf
            <div class="form-group">
                    <div class="form-group ">
                        <input type="text" name="nom" value="" class="form-control @error('nom') is-invalid @enderror" id="" placeholder="nom de l'utilisateur">
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
                        <input type="text" name="prenoms" value="" class="form-control @error('prenoms') is-invalid @enderror" id="" placeholder="prenoms de l'utilisateur">
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
                        <input type="text" name="telephone" value="" class="form-control @error('telephone') is-invalid @enderror" id="" placeholder="telephone de l'utilisateur">
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
                        <input type="email" name="email" value="" class="form-control @error('email') is-invalid @enderror" id="" placeholder="email de l'utilisateur">
                        @error('email')
                            <div class="invalid-feedback">
                                {{$errors->first('email')}}
                            </div>
                        @enderror
                    </div>
            </div>
            <!---->
            <div class="form-group">
                    <div class="form-group ">
                        <input type="password" name="password" value="" class="form-control @error('password') is-invalid @enderror" id="" placeholder="password de l'utilisateur">
                        @error('password')
                            <div class="invalid-feedback">
                                {{$errors->first('password')}}
                            </div>
                        @enderror
                    </div>
            </div>
            <!---->
            <div class="form-group">
                <label>Roles</label>
                    <select class="form-control" multiple name="roles[]">
                        @forelse ($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @empty  
                            <p>Pas de roles disponible</p>
                        @endforelse
                    </select>
            </div>
          
            {{--<div class="form-group ml-5">
                @foreach($roles as $role)
                            <div class="form-group">
                                <input 
                                type="checkbox" 
                                class="form-check-input" 
                                value="{{$role->id}}" 
                                name="role_id" 
                                >
                                <label for="" class="form-check-label">{{$role->name}}</label>

                            </div>
                @endforeach
            </div>--}}
            

            <button type="submit" name="submit" class="btn btn-primary">Valider</button>
    </form>

@endsection


