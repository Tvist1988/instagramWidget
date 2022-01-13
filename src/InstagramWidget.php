<?php

namespace app\src;

use app\models\InstagramSettings;
use GuzzleHttp\Client;
use InstagramScraper\Exception\InstagramAuthException;
use InstagramScraper\Exception\InstagramException;
use InstagramScraper\Exception\InstagramNotFoundException;
use InstagramScraper\Instagram;
use Phpfastcache\Helper\Psr16Adapter;
use Yii;
use yii\base\Widget;


class InstagramWidget extends Widget
{
     private $user;
     private $count;


     public function init()
     {
         parent::init();
         $instagramSettings = InstagramSettings::find()->one();
         if ($instagramSettings) {
         $this->user = $instagramSettings->user;
         $this->count = $instagramSettings->count_posts;
         } else {
             $this->user = 'forbes.russia';
             $this->count = 5;
         }
     }

     public function run() {
         try {
         $instagram = Instagram::withCredentials(new Client(),
         Yii::$app->params['instagram_user'], Yii::$app->params['instagram_password'], new Psr16Adapter('Files'));
            try {
             $instagram->login();

            } catch (InstagramAuthException $ex) {
                return $ex->getMessage();
            }
             $instagram->saveSession();
            try {
         $medias = $instagram->getMedias($this->user, $this->count);
         return $this->render('_instagram', ['feed' => $medias]);
            } catch (InstagramNotFoundException $ex) {
                return $ex->getMessage();
            }
         } catch (InstagramException $ex) {
             return $ex->getMessage() . ' Код ошибки ' . $ex->getCode();
         }

}

    /**
     * @param string $url
     * @return string
     */
     public static function getSrcImage(string $url):string {
         $imageData = base64_encode(file_get_contents($url));
         $src = 'data:img/jpeg;base64,' . $imageData;
         return $src;
     }
}