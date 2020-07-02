<?php


namespace console\controllers;

class IndexController extends Controller
{

    public function actionBuy()
    {

        $redis = $this->reids;
        echo $redis->set("hello-yii2", "yes");



    }

}