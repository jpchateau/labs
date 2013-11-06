<?php

namespace JP\InstagramBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    private static $photos = array();

    public function indexAction()
    {
        $instagramUser = null;
        $instagramLink = null;

        $session = $this->get('session');
        $instagramAPIManager = $this->get('instagram_api_manager');

        $accessToken = $session->get('instagram_access_token', null);
        if ($accessToken) {
            $url = $instagramAPIManager->getBaseEndpoint() . 'users/self/feed?access_token=' . $accessToken;
            $data = $this->makeApiCall($url);
            $data = json_decode($data, false);
            $this->processInstagramData($data);
        } else {
            $request = $this->get('request');
            $instagramCode = $request->query->get('code', null);
            if ($instagramCode) {
                $instagramUser = $instagramAPIManager->getUser($instagramCode);
                $session->set('instagram_username', $instagramUser['username']);
                $session->set('instagram_access_token', $instagramUser['access_token']);
            } else {
                $instagramLink = $instagramAPIManager->buildAuthorizationUrl();
            }
        }

        return $this->render('JPInstagramBundle:User:index.html.twig', array('link' => $instagramLink, 'user' => $instagramUser, 'photos' => self::$photos));

    }

    private function makeApiCall($url)
    {
        return $this->get('curl_manager')->getUrl($url, true);
    }

    private function processInstagramData($data)
    {
        if ($data->data && count($data->data)) {
            foreach ($data->data as $instagramPhoto) {
                if ($instagramPhoto->type !== 'image') {
                    continue;
                }
                $this->prepareImport($instagramPhoto);
            }
        }
    }

    private function prepareImport($instagramPhoto)
    {
        $photoToImport = array();
        $photoToImport['instagram_caption_created_time'] = (isset($instagramPhoto->caption->created_time) ? $instagramPhoto->caption->created_time : null);
        $photoToImport['instagram_username'] = $instagramPhoto->user->username;
        $photoToImport['instagram_link'] = $instagramPhoto->link;
        $photoToImport['instagram_image_standard'] = $instagramPhoto->images->standard_resolution->url;
        $photoToImport['instagram_image_thumbnail'] = $instagramPhoto->images->thumbnail->url;
        array_push(self::$photos, $photoToImport);
        unset($photoToImport);
    }

}
