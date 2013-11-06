<?php

namespace JP\InstagramBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TagController extends Controller
{

    private static $photos = array();

    public function indexAction()
    {
        $instagramAPIManager = $this->get('instagram_api_manager');
        $url = $instagramAPIManager->getBaseEndpoint() . 'tags/' . $instagramAPIManager->getTag() . '/media/recent?client_id=' . $instagramAPIManager->getClientId();

        $data = $this->makeApiCall($url);
        $data = json_decode($data, false);
        $this->processInstagramData($data);

        return $this->render('JPInstagramBundle:Tag:index.html.twig', array('tag' => $instagramAPIManager->getTag(), 'photos' => self::$photos));
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