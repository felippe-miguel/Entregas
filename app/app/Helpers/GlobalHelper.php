<?php
  
function getGeocodingByAddress($address) {
    $response = \GoogleMaps::load('geocoding')
        ->setParam (['address' => $address])
        ->get();
    
    $response = json_decode($response);

    return [
        "lat" => $response->results[0]->geometry->location->lat,
        "lng" => $response->results[0]->geometry->location->lng,
        "place_id" => $response->results[0]->place_id
    ];
}

function splitAddress($complete_address) {
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