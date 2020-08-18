@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-md-center">Formulaire d'ajout des clients</div>
                    <div class="card-body">

                        <!--
                        <div class="choix_client">
                            <p>Cliquez sur Nouveau client pour enregistrer un compte pour un nouveau client</p>
                            <p>Cliquez sur Client existant pour enregistrer un compte pour un client qui existe déjà</p>
                            <div id="select_client">
                                <button id="nouveau_client" name="nouveau_client" onclick="affiche_nouveau_client()">Nouveau Client</button>
                                <button id="client_existant" name="client_existant" onclick="affiche_client_existant()">Client Existant</button>
                            </div>
                            <form id="saisie_id_client" action="{$url_base}RechercheClientNonSalarie/rechercheClient" method="POST">
                                <input type="search" id="identifiant_client" name="identifiant_client" placeholder="identifiant client" />
                                <input type="submit" name="search" id="search" value="Search" />
                            </form>
                        </div>
                        -->
                        <form id="form_update_client_existant_non_salarie" method="POST" action="{{route('updateclientnonsalarie')}}"><!-- ou utilisé action="/medecin/persist"-->
                            @csrf
                            <h2>VEILLEZ SAISIR LES INFORMATIONS DU CLIENT</h2>
                            <p><i>Les champs marqué par </i><em>*</em> sont <em>obligatoires</em></p>
                            <fieldset>
                                <legend>Informations du Client</legend>
                                <div class="form-group">
                                    <label for="id" class="control-label">Identifiant du client</label>
                                    <input class="form-control" type="text" readonly="true" name="id" id="id" value="{{ $clientnonsalarie->id }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="nom" class="control-label">Nom du client <em>*</em></label>
                                    <input class="form-control" type="text" name="nom" id="nom" value="{{ $clientnonsalarie->nom }}" onblur="verifie_nom(this)"/>
                                </div>
                                <div class="form-group">
                                    <label for="prenom" class="control-label">Prénom du client <em>*</em></label>
                                    <input class="form-control" type="text" name="prenom" id="prenom" value="{{ $clientnonsalarie->prenom }}" onblur="verifie_prenom(this)" />
                                </div>
                                <div class="form-group">
                                    <label for="telephone" class="control-label">Numéro Téléphone <em>*</em></label>
                                    <input class="form-control" type="text" name="telephone" id="telephone" value="{{\App\Clients::find($clientnonsalarie->id_client)->telephone }}"  onblur="verifie_telephone(this)"/>
                                </div>
                                <div class="form-group">
                                    <label for="adresse" class="control-label">Adresse <em>*</em></label>
                                    <input class="form-control" type="text" name="adresse" id="adresse" value="{{\App\Clients::find($clientnonsalarie->id_client)->adresse }}" onblur="verifie_adresse(this)" />
                                </div>
                                <div class="form-group">
                                    <label for="email" class="control-label">Email</label>
                                    <input class="form-control" type="text" name="email" id="email" value="{{\App\Clients::find($clientnonsalarie->id_client)->email }}" onblur="verifie_email(this)" />
                                </div>
                                <div class="form-group">
                                    <label for="carte_identite" class="control-label">Numéro Carte d'identité <em>*</em></label>
                                    <input class="form-control" type="text" name="carte_identite" id="carte_identite" value="{{ $clientnonsalarie->carte_identite }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="type_client" class="control-label">Type de client <em>*</em></label>
                                    <input class="form-control" type="text" name="type_client" id="type_client" value="{{\App\Clients::find($clientnonsalarie->id_client)->type_client }}"/>
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
                                </div>
                                <div class="form-group">
                                    <label for="numero_agence" class="control-label">Numero Agence <em>*</em></label>
                                    <input class="form-control" type="text" name="numero_agence" id="numero_agence" value="{{\App\Comptes::find($clientnonsalarie->id_client)->numero_agence }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="numero_compte" class="control-label">Numero Compte <em>*</em></label>
                                    <input class="form-control" type="text" name="numero_compte" id="numero_compte" value="{{\App\Comptes::find($clientnonsalarie->id_client)->numero_compte }}" />
                                </div>
                                <div class="form-group">
                                    <label for="etat_compte" class="control-label">Etat compte <em>*</em></label>
                                    <input class="form-control" type="text" name="etat_compte" id="etat_compte" value="{{\App\Etatcompte::find($clientnonsalarie->id_client)->etat_compte }}" />
                                </div>
                                <div class="form-group">
                                    <label for="cle_rib" class="control-label">Clé Rib <em>*</em></label>
                                    <input class="form-control" type="text" name="cle_rib" id="cle_rib" value="{{\App\Comptes::find($clientnonsalarie->id_client)->cle_rib }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="solde" class="control-label">Solde</label>
                                    <input class="form-control" type="text" name="solde" id="solde" value="{{\App\Comptes::find($clientnonsalarie->id_client)->solde }}"/>
                                </div>
                                <div id="date_ouverture" class="form-group">
                                    <label for="date_ouverture" class="control-label">Date Ouverture <em>*</em></label>
                                    <input class="form-control" type="text" name="date_ouverture" id="date_ouverture" readonly value="{{\App\Comptes::find($clientnonsalarie->id_client)->date_ouverture }}"/>
                                </div>
                                <div id="frais_ouverture_compte" class="form-group">
                                    <label for="frais_ouverture" class="control-label">Frais Ouverture <em>*</em></label>
                                    <input class="form-control" type="text" name="frais_ouverture" id="frais_ouverture"/>
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
