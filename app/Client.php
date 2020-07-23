<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'cpf', 
        'email',
        'password',
        'cep',
        'street',
        'city',
        'uf',
        'neigh',
        'number',
        'phone',
        'birth_date',
        'gender'
    ];
}
