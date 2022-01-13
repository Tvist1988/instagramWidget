<?php

namespace app\controllers;

use app\models\InstagramSettings;
use Yii;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\Response;

class InstagramController extends Controller
{
    public function actionIndex()
    {
        $form = InstagramSettings::find()->one();
        if (!$form) {
            $form = new InstagramSettings();
        }
        if (\Yii::$app->request->post()) {

            if ($form->load(Yii::$app->request->post()) && $form->validate()) {
                $form->save();
            }
        }
        return $this->render('index', ['model' => $form]);
    }
}