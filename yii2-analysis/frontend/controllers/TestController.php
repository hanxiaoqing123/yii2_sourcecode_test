<?php

namespace frontend\controllers;

use frontend\components\Foo;
use Yii;

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

    public function actionIndex1()
    {
        $foo=new Foo();
        //注册事件
        $foo->on(Foo::EVENT_HELLO,['frontend\components\FooT','hello']);
        $foo->on(Foo::EVENT_HELLO,['frontend\components\BarT','hello']);
        //触发事件
        $foo->trigger(Foo::EVENT_HELLO);
    }

    public function actionIndex2()
    {
        Yii::$app->callA();
    }
}
