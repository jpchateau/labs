<?php

namespace JP\LibratoBundle\Library;

class Curl
{
    private static $endpoint;

    public function __construct($endPoint)
    {
        self::$endpoint = $endPoint;
    }

    public function getData($queryString)
    {

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, self::$endpoint . '/' . $queryString);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_close($curl);

        return $data;
    }

}