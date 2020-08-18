<?php

namespace App\Http\Controllers;

use App\Clientsalarie;
use Illuminate\Http\Request;

class ClientsalarieController extends Controller
{
    //gestion des connexions déconnexion
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add()
    {
        return view('clientsalarie.add');
    }
    public function persist(Request $request)
    {
        $clientsalarie = new Clientsalarie();
        $clientsalarie->nom = $request->nom;
        $clientsalarie->prenom = $request->prenom;
        $clientsalarie->telephone = $request->telephone;

        // on peut tester si l'enregistrement est ok en recupérant la valeur de retour qui est 1 ou 0 dans $result
        $result = $clientsalarie->save();
        if ($result)
        {
            return view('clientsalarie.add', ['confirmation' => "Client bien ajouté"]);
        }
        else
        {
            return view('clientsalarie.add', ['confirmation' => "Problème lors de l'ajout du client veillez ressayer"]);
        }
        //return $this->add();
    }
    public function getAll()
    {
        //$liste_medecins = Medecin::all();
        //Pour la pagination en Laravel
        $liste_salarie = Clientsalarie::paginate(5);
        return view('clientsalarie.liste', ['liste_salarie' => $liste_salarie]);
    }
}
