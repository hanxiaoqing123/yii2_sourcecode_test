<?php
namespace  frontend\components;
use yii\base\Behavior;

class A extends  Behavior{
    public  $aname="This is a";

    public function callA()
    {
        var_dump(__METHOD__);
    }

}