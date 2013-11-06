<?php

namespace JP\InstagramBundle\Manager;


class CurlManager
{
    public function __construct() {}

    /**
     * @param string $url
     * @param boolean $isSsl
     */
    public function getUrl($url, $isSsl = false)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        if ($isSsl === true) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    /**
     *
     * @param string $url
     * @param array $options
     * @param boolean $isSsl
     */
    public function postUrl($url, array $options, $isSsl = false)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        if ($isSsl === true) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $options);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}