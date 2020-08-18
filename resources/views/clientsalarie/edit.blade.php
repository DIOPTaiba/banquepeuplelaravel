@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-md-center">Formulaire d'enregistrement des medecins</div>
                    <div class="card-body">
                        @if(isset($confirmation))
                            <div class="alert alert-success">{{$confirmation}}</div>
                            <!--@ else  <div class="alert alert-danger">Medecin non ajouté</div>-->
                        @endif
                        <form method="POST" action="{{route('updatemedecin')}}"><!-- ou utilisé action="/medecin/persist"-->
                            @csrf
                            <div class="form-group">
                                <label for="id" class="control-label">Identifiant du medecin</label>
                                <input class="form-control" type="text" readonly="true" name="id" id="id" value="{{ $medecin->id }}"/>
                            </div>
                            <div class="form-group">
                                <label for="nom" class="control-label">Nom du medecin</label>
                                <input class="form-control" type="text" name="nom" id="nom" value="{{ $medecin->nom }}"/>
                            </div>
                            <div class="form-group">
                                <label for="prenom" class="control-label">Prénom du medecin</label>
                                <input class="form-control" type="text" name="prenom" id="prenom" value="{{ $medecin->prenom }}"/>
                            </div>
                            <div class="form-group">
                                <label for="telephone" class="control-label">Numéro Téléphone</label>
                                <input class="form-control" type="text" name="telephone" id="telephone" value="{{ $medecin->telephone }}"/>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-success" type="submit" name="envoyer" id="envoyer" value="Envoyer" />
                                <a class="btn btn-danger" href="{{ route('getallmedecin') }}">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
