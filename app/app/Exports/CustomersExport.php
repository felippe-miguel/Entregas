<?php

namespace App\Exports;

use App\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Customer::select([
            'id',
            'name',
            'email',
            'birth_date',
            'cpf',
            'address',
            'number',
            'complement',
            'neighborhood',
            'city',
            'cep',
            'place_id'
        ])->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'id',
            'nome',
            'email',
            'data de nascimento',
            'cpf',
            'logradouro',
            'número',
            'complemento',
            'bairro',
            'cidade',
            'cep',
            'ID do endereço'
        ];
    }
}