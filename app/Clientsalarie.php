<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientsalarie extends Model
{
    protected $fillable = array('id_client', 'nom', 'prenom', 'carte_identite', 'profession', 'salaire', 'nom_employeur', 'adresse_entreprise', 'raison_social', 'identifiant_entreprise');
    public static $rules = array('id_client'=>'required|integer',
        'nom'=>'required|min:2',
        'prenom'=>'required|min:2',
        'carte_identite'=>'required|min:3',
        'profession'=>'required|min:3',
        'salaire'=>'required|min:4',
        'nom_employeur'=>'required|min:3',
        'adresse_entreprise'=>'required|min:3',
        'raison_social'=>'required|min:3',
        'identifiant_entreprise'=>'required|min:3'
    );
    public function client()
    {
        return $this->hasOne('App\Clients');
    }
}
