<?php

namespace App\Imports;

use App\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CustomersImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $splitted_address = $this->splitAddress($row[4]);
        $place_id = $this->getGeocodingByAddress(implode(' ', $splitted_address));
        
        return new Customer([
            'name'          => $row[0],
            'email'         => $row[1],
            'birth_date'    => $row[2],
            'cpf'           => $row[3],
            'address'       => $splitted_address['street'],
            'number'        => $splitted_address['number'],
            'complement'    => $splitted_address['complement'],
            'neighborhood'  => $splitted_address['neighborhood'],
            'city'          => $splitted_address['city'],
            'cep'           => $row[5],
            'place_id'      => $place_id
        ]);
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    private function getGeocodingByAddress($address)
    {
        $response = \GoogleMaps::load('geocoding')
        ->setParam (['address' => $address])
        ->get();
    
        $response = json_decode($response);

        return $response->results[0]->place_id;
    }

    private function splitAddress($complete_address)
    {
        $exploded_address = explode( ' - ', $complete_address );
        $street = explode(',', $exploded_address[0])[0];
        $neighborhood = $exploded_address[1];
        $city = $exploded_address[2];
        $number_and_complement = explode(' ', explode(',', $exploded_address[0])[1]);
        $number = $number_and_complement[1];
        $complement = implode(' ', array_slice($number_and_complement, 2));
        $complement = ($complement != '') ? $complement : null;
    
        $splitted_address = [
            'street' => $street,
            'number' => $number,
            'complement' => $complement,
            'neighborhood'  => $neighborhood,
            'city' => $city
        ];
    
        return $splitted_address;
    }
}
