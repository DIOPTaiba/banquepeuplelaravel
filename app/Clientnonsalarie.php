<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientnonsalarie extends Model
{
    protected $fillable = array('id_client', 'nom', 'prenom', 'carte_identite');
    public static $rules = array('id_client'=>'required|integer',
        'nom'=>'required|min:2',
        'prenom'=>'required|min:2',
        'carte_identite'=>'required|min:3'
    );
    public function client()
    {
        return $this->hasOne('App\Clients');
    }
}
