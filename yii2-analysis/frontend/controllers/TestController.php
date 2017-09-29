<?php

namespace frontend\controllers;

class TestController extends \yii\web\Controller
{
    public function actionIndex()
    {
        //通过Yii::createObject方法实例化Test
        $testObject=\Yii::createObject([
            'class'=>'frontend\components\Test',
            'name'=>'new test name'
        ],[20]);
        echo "<pre>";
        print_r($testObject);
        echo "</pre>";
       // return $this->render('index');
    }

}
