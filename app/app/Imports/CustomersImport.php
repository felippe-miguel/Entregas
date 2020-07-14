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
        $splitted_address = splitAddress($row[4]);
        $google_maps_data = getGeocodingByAddress(implode(' ', $splitted_address));
        
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
          'lat'           => $google_maps_data['lat'],
          'lng'           => $google_maps_data['lng'],
          'place_id'      => $google_maps_data['place_id']
        ]);
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
}
