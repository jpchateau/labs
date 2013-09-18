<?php

namespace JP\LibratoBundle\Library;

class Curl
{
    private static $endpoint;

    public function __construct($endPoint)
    {
        self::$endpoint = $endPoint;
    }

    public function postMetric($name, $value, $source)
    {
        $postvalues = array('name'   => $name,
                            'value'  => $value,
                            'source' => $source);
        $postfields = http_build_query($postvalues);

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, self::$endpoint);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);

        $data = \curl_exec($curl);

        curl_close($curl);

        return $data;
    }

}