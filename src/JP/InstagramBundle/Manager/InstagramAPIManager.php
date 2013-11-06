<?php

namespace JP\InstagramBundle\Manager;

use JP\InstagramBundle\Manager\CurlManager;

class InstagramAPIManager
{
    private $baseEndpoint;
    private $clientId;
    private $clientSecret;
    private $tag;
    private $redirectUri;
    private $accessTokenUrl;
    private $authorizationUrl;
    private $curlManager;


    public function __construct($baseEndpoint, $clientId, $clientSecret, $tag, $redirectUri, $accessTokenUrl, $authorizationUrl, CurlManager $curlManager)
    {
        $this->baseEndpoint     = $baseEndpoint;
        $this->clientId         = $clientId;
        $this->clientSecret     = $clientSecret;
        $this->tag              = $tag;
        $this->redirectUri      = $redirectUri;
        $this->accessTokenUrl   = $accessTokenUrl;
        $this->authorizationUrl = $authorizationUrl;
        $this->curlManager      = $curlManager;
    }

    public function getBaseEndpoint()
    {
        return $this->baseEndpoint;
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    public function getTag()
    {
        return $this->tag;
    }

    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    public function getAccessTokenUrl()
    {
        return $this->accessTokenUrl;
    }

    public function instagramAccessTokenRequest($url, array $options)
    {
        return $this->curlManager->postUrl($url, $options, true);
    }

    /**
     *
     * @param string $source
     * @return string
     */
    public function buildAuthorizationUrl()
    {
        return $this->authorizationUrl . '?client_id=' . $this->clientId . '&redirect_uri=' . $this->redirectUri . '&response_type=code';
    }

    /**
     *
     * @param string $code
     * @param string $source
     */
    public function getUser($code)
    {
        $parameters = array('client_id'     => $this->clientId,
                            'client_secret' => $this->clientSecret,
                            'grant_type'    => 'authorization_code',
                            'redirect_uri'  => $this->redirectUri,
                            'code'          => $code
        );
        $instagramResponse = $this->curlManager->postUrl($this->accessTokenUrl, $parameters, true);
        $instagramResponse = json_decode($instagramResponse);
        if (isset($instagramResponse->user)) {
            return array('username'     => $instagramResponse->user->username,
                         'access_token' => $instagramResponse->access_token
            );
        }
        return null;
    }

}