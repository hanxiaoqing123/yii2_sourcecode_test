<?php
class B{
    public $name;
    private  $_definitions=[];

    public function __get($name)
    {
        return isset($this->_definitions[$name])?$this->_definitions[$name]:null;
    }
    public function __set($name,$value)
    {
        $this->_definitions[$name]=$value;
    }

}
$config=[
     'class'=>'B',
     'name'=>'zhangsan',
     'age'=>20
];
//创建一个B对象 并为B的对象属性赋值
$class=$config['class'];
unset($config['class']);
$object=new $class;
foreach ($config as $k=>$v){
    $object->$k = $v;
}
var_dump($object->name);
var_dump($object->age);