<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comptecourant extends Model
{
    protected $fillable = array('id_compte', 'agios');
    public static $rules = array('id_compte'=>'required|integer',
        'agios'=>'required|min:4'
    );
    public function compte()
    {
        return $this->hasOne('App\Comptes');
    }
}
