<?php

namespace JP\InstagramBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{

    public function feedAction()
    {
        $request = $this->get('request');
        $code = $request->query->get('code', null);
        if ($code) {
            $parameters = array('client_id' => $this->container->getParameter('instagram_client_id'),
                                'client_secret' => $this->container->getParameter('instagram_client_secret'),
                                'grant_type' => 'authorization_code',
                                'redirect_uri' => 'http://labs.local/instagram/user',
                                'code' => $code);
            $url = 'https://api.instagram.com/oauth/access_token?' . http_build_query($parameters);

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($curl);
            curl_close($curl);
            die(var_dump($response));
        }
        return $this->render('JPInstagramBundle:User:feed.html.twig');
    }
}
