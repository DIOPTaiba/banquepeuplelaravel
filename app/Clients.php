<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $fillable = array('user_id', 'adresse', 'telephone', 'email', 'date_inscription', 'type_client');
    public static $rules = array('user_id'=>'required|bigInteger',
        'adresse'=>'required|min:3',
        'telephone'=>'required|min:9',
        'email'=>'required|min:5',
        'date_inscription'=>'required|min:5',
        'type_client'=>'required|min:5'
    );
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function comptes()
    {
        return $this->hasMany('App\Comptes');
    }
    public function clientnonsalarie()
    {
        return $this->hasOne('App\Clientnonsalarie');
    }
    public function clientsalarie()
    {
        return $this->hasOne('App\Clientsalarie');
    }
    public function clientmoral()
    {
        return $this->hasOne('App\Clientmoral');
    }
}
