<?php
class A{
    public $name;
    protected  $sex;
    private $weight;
    //读取类不存在或者不可访问的属性时会被自动调用
    public function __get($name)
    {
        var_dump($name);
    }
    //给类不存在或者不可访问的属性赋值时会被自动调用
    public  function __set($name, $value)
    {
        var_dump($name,$value);
    }
}
$a=new A();
//$a->name='zhangsan';
//echo $a->name.PHP_EOL;  zhangsan
//echo $a->age;   string(3) "age"
//$a->age=20;     string(3) "age"  int(20)
//$a->sex="男";   string(3) "sex"  string(3) "男"
$a->weight="45KG";  // string(6) "weight"  string(4) "45KG"
