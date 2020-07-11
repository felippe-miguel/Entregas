<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'birth_date',
        'cpf',
        'address',
        'number',
        'complement',
        'neighborhood',
        'city',
        'cep'
    ];
}
