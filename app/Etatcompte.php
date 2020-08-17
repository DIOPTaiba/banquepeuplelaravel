<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etatcompte extends Model
{
    protected $fillable = array('id_compte', 'etat_compte', 'date_changement_etat');
    public static $rules = array('id_compte'=>'required|integer',
        'etat_compte'=>'required|min:3',
        'date_changement_etat'=>'required|min:4'
    );
    public function compte()
    {
        return $this->hasMany('App\Comptes');
    }
}
