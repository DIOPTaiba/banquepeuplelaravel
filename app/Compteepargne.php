<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compteepargne extends Model
{
    protected $fillable = array('id_compte', 'frais_ouverture', 'montant_remuneration');
    public static $rules = array('id_compte'=>'required|integer',
        'frais_ouverture'=>'required|min:4',
        'montant_remuneration'=>'required|min:4'
    );
    public function compte()
    {
        return $this->hasOne('App\Comptes');
    }
}
