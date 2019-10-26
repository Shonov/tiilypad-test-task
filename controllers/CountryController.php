<?php

namespace app\controllers;

use app\models\Country;
use Yii;
use yii\web\Response;

class CountryController extends \yii\web\Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $countries = Country::find()->orderBy('title')->all();
        return $this->render('index', [
            'countries' => $countries
        ]);
    }

    /**
     * ajax request processing
     *
     * @param $id
     * @return array
     */
    public function actionSample($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $country = Country::findOne($id);
        if (isset($country)) {
            return [
                'search' => $country->cities,
                'countryTitle' => $country->title
            ];
        }

        return [];
    }
}
