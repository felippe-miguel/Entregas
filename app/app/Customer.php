<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Customer extends Model
{
    protected $dates = [
        'birth_date',
    ];

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

    public function getBirthDateAttribute($birth_date)
    {
        return Carbon::parse($birth_date)->format('d/m/Y');
    }

    public function setBirthDateAttribute($birth_date)
    {
        $birth_date = Carbon::createFromFormat('d/m/Y', $birth_date);
        $this->attributes['birth_date'] = Carbon::parse($birth_date)->format('Y-m-d');
    }
}
