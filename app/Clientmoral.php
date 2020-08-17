<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientmoral extends Model
{
    protected $fillable = array('id_client', 'nom_entreprise', 'identifiant_entreprise', 'raison_social');
    public static $rules = array('id_client'=>'required|integer',
        'nom_entreprise'=>'required|min:4',
        'identifiant_entreprise'=>'required|min:2',
        'raison_social'=>'required|min:3'
    );
    public function client()
    {
        return $this->hasOne('App\Clients');
    }
}
