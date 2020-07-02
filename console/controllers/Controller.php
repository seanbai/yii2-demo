<?php
namespace console\controllers;

use console\controllers\BaseController;
use yii\redis\ActiveQuery;

class Controller extends BaseController
{
    /**
     * @var ActiveQuery
     */
    protected $reids;

    public function init()
    {
        parent::init();
        $this->reids = \Yii::$app->redis;
    }


}