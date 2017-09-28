<?php
class Container{
    //基于反射，让container变得更加强悍一些
    public function get($class,$params=[])
    {
         return $this->build($class,$params);
    }

    public function build($class,$params)
    {
        $dependencies=[];
        $reflection=new ReflectionClass($class);
        $constuctor=$reflection->getConstructor();
        if($constuctor!=null){
            foreach ($constuctor->getParameters() as $param){
                $c=$param->getClass();
                if($c!=null){
                    $dependencies[]=$this->get($c->getName(),$params);
                }
            }
        }
        foreach ($params as $index=>$param){
            $dependencies[$index]=$param;
        }
        //从给出的参数创建一个新的类实例
        return $reflection->newInstanceArgs($dependencies);
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
$container=new Container();
$user=$container->get("User",['EmailSenderBy163'=>'this is name']);
echo "<pre>";
print_r($user);
echo "</pre>";
/*
 User Object
(
    [_emailSenderObject:User:private] => EmailSenderBy163 Object
        (
            [_name:EmailSenderBy163:private] =>
        )

)
 * */