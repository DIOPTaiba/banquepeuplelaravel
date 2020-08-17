<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comptebloque extends Model
{
    protected $fillable = array('id_compte', 'frais_ouverture', 'montant_remuneration', 'duree_blocage');
    public static $rules = array('id_compte'=>'required|integer',
        'frais_ouverture'=>'required|min:4',
        'montant_remuneration'=>'required|min:4',
        'duree_blocage'=>'required|integer'
    );
    public function compte()
    {
        return $this->hasOne('App\Comptes');
    }
}
