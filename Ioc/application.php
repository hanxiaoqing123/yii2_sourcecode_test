<?php
class Container{
    private  $_definitions;

//存储定义的类  $class类名  $definition回调函数，用于创建类$class
    public function set($class,$definition)
    {
        $this->_definitions[$class]=$definition;
    }
//实例化类
    public function get($class,$params=[])
    {
        //$definition=$this->_definitions[$class];
        //return  call_user_func($definition,$params);
        //扩展一下，实现有依赖其他对象的类
        if(isset($this->_definitions[$class]) && is_callable($this->_definitions[$class],true)){
            $definition=$this->_definitions[$class];
            return  call_user_func($definition,$this,$params);
        }else{
            throw  new Exception("error");
        }
    }


}

class EmailSenderBy163{
    private  $_name;

    public function __construct($name= "")
    {
        $this->_name=$name;
    }

    public function send()
    {

    }

}

class User{
    private $_emailSenderObject;

    public function __construct(EmailSenderBy163 $emailSenderObject)
    {
        $this->_emailSenderObject=$emailSenderObject;

    }

    public function register()
    {
        $this->_emailSenderObject->send();

    }

}

//用Container实例化 EmailSenderBy163 和 User
$container=new Container();
$container->set('EmailSenderBy163',function ($container,$name=""){
    return new EmailSenderBy163($name);
});
$container->set('User',function ($container,$params=[]){
    return new User($container->get($params[0],$params[1]));
});
echo "<pre>";
print_r($container->get('EmailSenderBy163',['163']));
print_r($container->get('User',['EmailSenderBy163','163']));
echo "</pre>";