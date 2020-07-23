<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'code_client',
        'email',
        'address',
        'complement',
        'cep',
        'phone',
        'birth_date',
        'password',
        'gender',
        'cpf', 
    ];
}
