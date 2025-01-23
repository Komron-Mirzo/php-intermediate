<?php

require_once('./config.php');


class curlAPI {

    public $city;
    public $limit;
    
    function __construct($city, $limit){
        $this->city = $city;
        $this->limit = $limit;
    }

    public function dynamicUrl () {

        //Set the url
        $baseUrl = "http://api.openweathermap.org/geo/1.0/direct?";
    
        $queryParam = [
            'q' => $this->city,
            'limit' => $this->limit,
            'appid' => APP_ID
        ];
    
        $queryString = http_build_query($queryParam);
    
        $url = $baseUrl . $queryString; 
    
        return $url;
    }

    
    public function getCoordinates () {
        //Initialize Curl
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->dynamicUrl());

        //Set options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return as string
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);

        //Execute the request
        $response = curl_exec($ch);


        //Check for errors
        if (curl_errno($ch)) {
            echo 'cURL error:' . curl_error($ch);
        } else {
            // Decode/Read the JSON response
            $data = json_decode($response);

            
            return [
                'longitude' => $data[0]->lon,
                'latitude' => $data[0]->lat
            ];
        }
    }



}


$newCurl = new curlApi('London', 5);

$newCurl->getCoordinates();

echo '<pre>';
print_r($newCurl->getCoordinates());
echo '</pre>';




?>