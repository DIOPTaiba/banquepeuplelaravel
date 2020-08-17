<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comptes extends Model
{
    protected $fillable = array('id_client', 'numero_compte', 'cle_rib', 'solde', 'date_ouverture', 'numero_agence');
    public static $rules = array('id_client'=>'required|integer',
        'numero_compte'=>'required|min:4',
        'cle_rib'=>'required|min:2',
        'solde'=>'required|min:4',
        'date_ouverture'=>'required|min:5',
        'numero_agence'=>'required|min:1'
    );
    public function clients()
    {
        return $this->belongsTo('App\Clients');
    }
    public function compteepargne()
    {
        return $this->hasOne('App\Compteepargne');
    }
    public function comptecourant()
    {
        return $this->hasOne('App\Comptecourant');
    }
    public function comptebloque()
    {
        return $this->hasOne('App\Comptebloque');
    }
    public function etatscomptes()
    {
        return $this->belongsTo('App\Etatcompte');
    }
}
