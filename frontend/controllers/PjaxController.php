<?php

namespace frontend\controllers;

class PjaxController extends \yii\web\Controller
{
    public function actionIndex(){
        $time = date("H:i:s");
        return $this->render('index', ['time' => $time]);
    }

    public function actionHours(){
        $time = date("H:i:s");
        return $this->render('date', ['time' => $time]);
    }

    public function actionMinutes(){
        $time = date("i:s");
        return $this->render('date', ['time' => $time]);
    }

    public function actionMultiple(){
        $time = date("H:i:s");
        $hash = md5($time);
        return $this->render('multiple', [
            'time' => $time,
            'hash' => $hash
        ]);
    }
}
