@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-md-center">Formulaire d'ajout des clients</div>
                    <div class="card-body">
                        @if(isset($confirmation))
                            <div class="alert alert-success text-center">{{$confirmation}}</div>
                        @elseif(isset($erreur))
                            <div class="alert alert-danger text-center">{{$erreur}}</div>
                        @endif
                            <div class="choix_client">

                                <p>Cliquez sur Nouveau client pour enregistrer un compte pour un nouveau client</p>
                                <p>Cliquez sur Client existant pour enregistrer un compte pour un client qui existe déjà</p>
                                <div id="select_client">
                                    <button id="nouveau_client" name="nouveau_client" onclick="affiche_nouveau_client()">Nouveau Client</button>
                                    <!--<label for="nouveau_client"></label><br>-->
                                    <button id="client_existant" name="client_existant" onclick="affiche_client_existant()">Client Existant</button>
                                    <!--<label for="client_existant"></label><br>-->
                                </div>
                                <form id="saisie_id_client" action="{$url_base}RechercheClientNonSalarie/rechercheClient" method="POST">
                                    <input type="search" id="identifiant_client" name="identifiant_client" placeholder="identifiant client" />
                                    <input type="submit" name="search" id="search" value="Search" />
                                </form>
                            </div>
                            <form id="form_compte_non_salarie" method="POST" action="{{route('persistclientnonsalarie')}}"><!-- ou utilisé action="/medecin/persist"-->
                                @csrf
                                <h2>VEILLEZ SAISIR LES INFORMATIONS DU CLIENT</h2>
                                <p><i>Les champs marqué par </i><em>*</em> sont <em>obligatoires</em></p>
                                <fieldset>
                                    <legend>Informations du Client</legend>
                                    <div class="form-group">
                                        <label for="nom" class="control-label">Nom du client <em>*</em></label>
                                        <input class="form-control" type="text" name="nom" id="nom" placeholder="ex : DIOP" onblur="verifie_nom(this)"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="prenom" class="control-label">Prénom du client <em>*</em></label>
                                        <input class="form-control" type="text" name="prenom" id="prenom" placeholder="ex : Mor" onblur="verifie_prenom(this)" />
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone" class="control-label">Numéro Téléphone <em>*</em></label>
                                        <input class="form-control" type="text" name="telephone" id="telephone" placeholder="ex : +2217xxxxxxxx " onblur="verifie_telephone(this)"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="adresse" class="control-label">Adresse <em>*</em></label>
                                        <input class="form-control" type="text" name="adresse" id="adresse" placeholder="ex : Grand Yoff" onblur="verifie_adresse(this)" />
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="control-label">Email</label>
                                        <input class="form-control" type="text" name="email" id="email" placeholder="ex : prenom.nom@simplon.co" onblur="verifie_email(this)" />
                                    </div>
                                    <div class="form-group">
                                        <label for="carte_identite" class="control-label">Numéro Carte d'identité <em>*</em></label>
                                        <input class="form-control" type="text" name="carte_identite" id="carte_identite" placeholder="1234567891234"/>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <legend>Informations Compte</legend>
                                    <div class="form-group">
                                        <label class="selection_type_compte control-label" for="type_compte" >Choisissez le type de compte <em>*</em></label>
                                        <select id="type_compte" name="type_compte" class="form-control" >
                                            <option value="non selection">Faites un choix</option>
                                            <option value="compte epargne">Compte Epargne</option>
                                            <option id="compte_bloque" value="compte bloque" onselect="verification_duree_blocage(this)">Compte Bloqué</option>
                                        </select>
                                        <span id="erreur_selection"></span>
                                        <br/>
                                    </div>
                                    <div class="form-group">
                                        <label for="numero_agence" class="control-label">Numero Agence <em>*</em></label>
                                        <input class="form-control" type="text" name="numero_agence" id="numero_agence" />
                                    </div>
                                    <div class="form-group">
                                        <label for="numero_compte" class="control-label">Numero Compte <em>*</em></label>
                                        <input class="form-control" type="text" name="numero_compte" id="numero_compte" />
                                    </div>
                                    <div class="form-group">
                                        <label for="cle_rib" class="control-label">Clé Rib <em>*</em></label>
                                        <input class="form-control" type="text" name="cle_rib" id="cle_rib" />
                                    </div>
                                    <div class="form-group">
                                        <label for="solde" class="control-label">Solde</label>
                                        <input class="form-control" type="text" name="solde" id="solde" />
                                    </div>
                                    <div id="frais_ouverture_compte" class="form-group">
                                        <label for="frais_ouverture" class="control-label">Frais Ouverture <em>*</em></label>
                                        <input class="form-control" type="text" name="frais_ouverture" id="frais_ouverture" value="10000"/>
                                    </div>
                                    <div id="montant_remuneration_compte" class="form-group">
                                        <label for="montant_remuneration" class="control-label">Montant Remuneration <em>*</em></label>
                                        <input class="form-control" type="text" name="montant_remuneration" id="montant_remuneration" />
                                    </div>
                                    <div id="agios_compte" class="form-group">
                                        <label for="agios" class="control-label">Agios <em>*</em></label>
                                        <input class="form-control" type="text" name="agios" id="agios" />
                                    </div>
                                    <div id="duree_blocage_compte" class="form-group">
                                        <label for="duree_blocage" class="control-label">Durée Blocage <em>*</em></label>
                                        <input class="form-control" type="text" name="duree_blocage" id="duree_blocage" /><span id="mois"> mois </span><span id="erreur_duree"></span>
                                    </div>
                                </fieldset>
                                <div id="validation">
                                    <input class="btn btn-success" type="submit" name="envoyer" id="valide" value="Valider" />
                                    <input class="btn btn-danger" type="reset" name="annuler" id="annule" value="Annuler" />
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
