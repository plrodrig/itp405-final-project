<?php

namespace App\Services\API;

class Geolocation{
  protected $clientID;
  public function __construct(array $config = [])
  {
  //  $this->clientID = $config['clientID'];
  }

  public function location($loc)
  {
    
    $maps_url = "https://maps.googleapis.com/maps/api/geocode/json?address=$loc";
    $maps_json = file_get_contents($maps_url);
  //  $maps_array = json_decode($maps_json);
  //  echo($maps_json);
    //dd($maps_array);
   return $maps_json;
  }

}
