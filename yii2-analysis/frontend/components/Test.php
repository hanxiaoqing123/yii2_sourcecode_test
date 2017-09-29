<?php
namespace  frontend\components;
use Yii;
class Test{
    public $name;
    private $_age;
    private $_t;

    public function __construct($age,T $t)
    {
        $this->_age=$age;
        $this->_t=$t;

    }

}