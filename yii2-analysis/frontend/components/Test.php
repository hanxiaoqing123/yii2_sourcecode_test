<?php
namespace  frontend\components;
use Yii;
class Test{
    public $name;
    private $_age;
    private $_t;
    //Test依赖T
    public function __construct($age,T $t)
    {
        $this->_age=$age;
        $this->_t=$t;

    }

}