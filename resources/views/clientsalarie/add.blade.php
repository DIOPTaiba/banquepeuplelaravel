@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-md-center">Formulaire d'ajout des clients</div>
                    <div class="card-body">
                        @if(isset($confirmation))
                            <div class="alert alert-success">{{$confirmation}}</div>
                            <!--@ else  <div class="alert alert-danger">Medecin non ajouté</div>-->
                        @endif
                        <form id="form_insert_client_existant_non_salarie" method="POST" action="{{route('persistclientnonsalarie')}}"><!-- ou utilisé action="/medecin/persist"-->
                            @csrf
                            <div class="form-group">
                                <label for="nom" class="control-label">Nom du client</label>
                                <input class="form-control" type="text" name="nom" id="nom" />
                            </div>
                            <div class="form-group">
                                <label for="prenom" class="control-label">Prénom du client</label>
                                <input class="form-control" type="text" name="prenom" id="prenom" />
                            </div>
                            <div class="form-group">
                                <label for="telephone" class="control-label">Numéro Téléphone</label>
                                <input class="form-control" type="text" name="telephone" id="telephone" />
                            </div>
                            <div class="form-group">
                                <label for="adresse" class="control-label">Adresse</label>
                                <input class="form-control" type="text" name="adresse" id="adresse" />
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input class="form-control" type="text" name="email" id="email" />
                            </div>
                            <div class="form-group">
                                <label for="carte_identite" class="control-label">Numéro Carte d'identité</label>
                                <input class="form-control" type="text" name="carte_identite" id="carte_identite" />
                            </div>
                            <div class="form-group">
                                <label for="type_compte" class="control-label">Choisissez le type de compte</label>
                                <select class="form-control" name="type_compte" id="type_compte" >
                                    <option value="non selection">Faites un choix</option>
                                    <option value="compte epargne">Compte Epargne</option>
                                    <option value="compte bloque">Compte Bloqué</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="numero_agence" class="control-label">Numero Agence</label>
                                <input class="form-control" type="text" name="numero_agence" id="numero_agence" />
                            </div>
                            <div class="form-group">
                                <label for="numero_compte" class="control-label">Numero Compte</label>
                                <input class="form-control" type="text" name="numero_compte" id="numero_compte" />
                            </div>
                            <div class="form-group">
                                <label for="cle_rib" class="control-label">Clé Rib</label>
                                <input class="form-control" type="text" name="cle_rib" id="cle_rib" />
                            </div>
                            <div class="form-group">
                                <label for="solde" class="control-label">Solde</label>
                                <input class="form-control" type="text" name="solde" id="solde" />
                            </div>
                            <div id="frais_ouverture_compte" class="form-group">
                                <label for="frais_ouverture" class="control-label">Frais Ouverture</label>
                                <input class="form-control" type="text" name="frais_ouverture" id="frais_ouverture" />
                            </div>
                            <div id="montant_remuneration_compte" class="form-group">
                                <label for="montant_remuneration" class="control-label">Montant Remuneration</label>
                                <input class="form-control" type="text" name="montant_remuneration" id="montant_remuneration" />
                            </div>
                            <div id="agios_compte" class="form-group">
                                <label for="agios" class="control-label">Agios</label>
                                <input class="form-control" type="text" name="agios" id="agios" />
                            </div>
                            <div id="duree_blocage_compte" class="form-group">
                                <label for="duree_blocage" class="control-label">Durée Blocage</label>
                                <input class="form-control" type="text" name="duree_blocage" id="duree_blocage" />
                            </div>
                            <div class="form-group">
                                <input class="btn btn-success" type="submit" name="envoyer" id="envoyer" value="Envoyer" />
                                <input class="btn btn-danger" type="reset" name="annuler" id="annuler" value="Annuler" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
