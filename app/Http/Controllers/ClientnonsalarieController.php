<?php

namespace App\Http\Controllers;

use App\Clientnonsalarie;
use App\Clients;
use App\Comptebloque;
use App\Compteepargne;
use App\Comptes;
use App\Etatcompte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientnonsalarieController extends Controller
{
    //gestion des connexions déconnexion
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add()
    {
        return view('clientnonsalarie.add');
    }
    public function persist(Request $request)
    {
        $date_inscription = new \DateTime();
        $date_ouverture = new \DateTime();
        $date_changement_etat = new \DateTime();

        $client = new Clients();
        $client->adresse = $request->adresse;
        $client->telephone = $request->telephone;
        $client->email = $request->email;
        $client->date_inscription = $date_inscription;
        $client->type_client = "Non Salarié";
        $client->user_id = Auth::id();

        $client->save();
        $id_client = $client->id;

        $clientnonsalarie = new Clientnonsalarie();
        $clientnonsalarie->nom = $request->nom;
        $clientnonsalarie->prenom = $request->prenom;
        $clientnonsalarie->carte_identite = $request->carte_identite;
        $clientnonsalarie->id_client = $id_client;

        $result = $clientnonsalarie->save();

        $compte = new Comptes();
        $compte->numero_compte = $request->numero_compte;
        $compte->cle_rib = $request->cle_rib;
        $compte->solde = $request->solde;
        $compte->date_ouverture = $date_ouverture;
        $compte->numero_agence = $request->numero_agence;
        $compte->id_client = $id_client;

        $compte->save();
        $id_compte = $compte->id;

        $etat_compte = new Etatcompte();
        $etat_compte->etat_compte = "Actif";
        $etat_compte->date_changement_etat = $date_changement_etat;
        $etat_compte->id_compte = $id_compte;

        $etat_compte->save();

        $type_compte = $request->type_compte;
        if($type_compte == 'compte epargne')
        {
            $compte_epargne = new Compteepargne();
            $compte_epargne->frais_ouverture = $request->frais_ouverture;
            $compte_epargne->montant_remuneration = $request->montant_remuneration;
            $compte_epargne->id_compte = $id_compte;

            $compte_epargne->save();
        }
        else
        {
            $compte_bloque = new Comptebloque();
            $compte_bloque->frais_ouverture = $request->frais_ouverture;
            $compte_bloque->montant_remuneration = $request->montant_remuneration;
            $compte_bloque->duree_blocage = $request->duree_blocage;
            $compte_bloque->id_compte = $id_compte;

            $compte_bloque->save();
        }

        // on peut tester si l'enregistrement est ok en recupérant la valeur de retour qui est 1 ou 0 dans $result
        if ($result)
        {
            return view('clientnonsalarie.add', ['confirmation' => "Client bien ajouté"]);
        }
        else
        {
            return view('clientnonsalarie.add', ['erreur' => "Client non ajouté"]);
        }
        //return $this->add();
    }
    public function getAll()
    {
        //$liste_non_salarie = Clientnonsalarie::all();
        //Pour la pagination en Laravel
        $liste_non_salarie = Clientnonsalarie::paginate(5);
        return view('clientnonsalarie.liste', ['liste_non_salarie' => $liste_non_salarie]);
    }
    public function edit($id)
    {
        $clientnonsalarie = Clientnonsalarie::find($id);
        return view('clientnonsalarie.edit', ['clientnonsalarie' => $clientnonsalarie]);
    }
    public function update(Request $request)
    {
        // on peut tester si l'enregistrement est ok en recupérant la valeur de retour qui est 1 ou 0 dans $result

        $date_inscription = new \DateTime();
        $date_ouverture = new \DateTime();
        $date_changement_etat = new \DateTime();

        //on recupère les infos du client non salarié
        $clientnonsalarie = Clientnonsalarie::find($request->id);

        $client = Clients::find($clientnonsalarie->id_client);
        $client->adresse = $request->adresse;
        $client->telephone = $request->telephone;
        $client->email = $request->email;
        //$client->date_inscription = $date_inscription;
        $client->type_client = $request->type_client;
        $client->user_id = Auth::id();

        $client->save();
        //$id_client = $client->id;

        $clientnonsalarie->nom = $request->nom;
        $clientnonsalarie->prenom = $request->prenom;
        $clientnonsalarie->carte_identite = $request->carte_identite;
        //$clientnonsalarie->id_client = $id_client;

        $result = $clientnonsalarie->save();

        $compte = Comptes::find($clientnonsalarie->id_client);
        $compte->numero_compte = $request->numero_compte;
        $compte->cle_rib = $request->cle_rib;
        $compte->solde = $request->solde;
        //$compte->date_ouverture = $date_ouverture;
        $compte->numero_agence = $request->numero_agence;
        //$compte->id_client = $id_client;

        $compte->save();
        //$id_compte = $compte->id;

        $etat_compte = Etatcompte::find($compte->id);
        $etat_compte->etat_compte = "Actif";
        $etat_compte->date_changement_etat = $date_changement_etat;
        //$etat_compte->id_compte = $id_compte;

        $etat_compte->save();

        $type_compte = $request->type_compte;
        if($type_compte == 'compte epargne')
        {
            $compte_epargne = Compteepargne::find($compte->id);
            $compte_epargne->frais_ouverture = $request->frais_ouverture;
            $compte_epargne->montant_remuneration = $request->montant_remuneration;
            //$compte_epargne->id_compte = $id_compte;

            $compte_epargne->save();
        }
        else
        {
            $compte_bloque = Comptebloque::find($compte->id);
            $compte_bloque->frais_ouverture = $request->frais_ouverture;
            $compte_bloque->montant_remuneration = $request->montant_remuneration;
            $compte_bloque->duree_blocage = $request->duree_blocage;
            //$compte_bloque->id_compte = $id_compte;

            $compte_bloque->save();
        }

        // on peut tester si l'enregistrement est ok en recupérant la valeur de retour qui est 1 ou 0 dans $result
        if ($result)
        {
            return view('clientnonsalarie.add', ['confirmation' => "Infos client maj"]);
        }
        else
        {
            return view('clientnonsalarie.add', ['erreur' => "Client non ajouté"]);
        }
        //return $this->add();
    }
}
