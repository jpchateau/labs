<?php

namespace JP\LibratoBundle\Library;

class Curl
{
    private static $endpoint;

    public function __construct($endPoint)
    {
        self::$endpoint = $endPoint;
    }

    public function postMetric($name, $value)
    {
        $curl_post_data = array('gauges' => array(array('name'   => $name,
                            'value'  => $value,
                            )));

        $curl = curl_init();

$headers = array(
    'Content-Type: application/json'
);

        curl_setopt($curl, CURLOPT_URL, self::$endpoint);
        curl_setopt($curl, CURLOPT_USERPWD, 'contact@jpchateau.com:d5792196b3a31ed77141f4704cf5559c9672fa2926a0af7cdea958c30967e11c');
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);    
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($curl_post_data));

        $data = curl_exec($curl);

        curl_close($curl);

        return $data;
    }

}
