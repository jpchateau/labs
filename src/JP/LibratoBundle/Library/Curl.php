<?php

namespace JP\LibratoBundle\Library;

class Curl
{
    private $endpoint;
    private $user;
    private $token;

    public function __construct($endPoint, $user, $token)
    {
        $this->endpoint = $endPoint;
        $this->user = $user;
        $this->token = $token;
    }

    public function postMetric($name, $value, $source = null)
    {
        $headers = array('Content-Type: application/json');
        $userPwd = $this->user . ':' . $this->token;
        $gauge = array('name' => $name, 'value'  => $value);
        if ($source) {
            $gauge['source'] = $source;
        }
        $curl_post_data = array(
            'gauges' => array($gauge)
        );

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this->endpoint . '/metrics');
        curl_setopt($curl, CURLOPT_USERPWD, $userPwd);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($curl_post_data));

        curl_exec($curl);
        curl_close($curl);
    }

    public function postAnnotation($name)
    {
        $headers = array('Content-Type: application/json');
        $userPwd = $this->user . ':' . $this->token;
        $annotation = array('title' => 'deploy');
        $curl_post_data = array($annotation);

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this->endpoint . '/annotations/' . $name);
        curl_setopt($curl, CURLOPT_USERPWD, $userPwd);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($curl_post_data));

        $data = curl_exec($curl);
        die(var_dump($data));
        curl_close($curl);
    }

}