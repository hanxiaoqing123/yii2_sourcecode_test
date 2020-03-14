<?php
class Container{
    //基于反射，让container变得更加强悍一些
    public function get($class,$params=[])
    {
         return $this->build($class,$params);
    }

    public function build($class,$params)
    {
        $dependencies=[];   //其他依赖
        $reflection=new ReflectionClass($class); //新建一个反射对象
        $constructor=$reflection->getConstructor();  //获取构造方法
        /*
         var_dump($constuctor);
         object(ReflectionMethod)[3]
             public 'name' => string '__construct' (length=11)
             public 'class' => string 'User' (length=4)
         * */
        if($constructor!=null){
            //继承自 ReflectionFunctionAbstract::getParameters — 获取构造方法参数
            /*
             var_dump($constuctor->getParameters());
             array (size=1)
                0 =>
                    object(ReflectionParameter)[4]
                    public 'name' => string 'emailSenderObject' (length=17)
             * */
            //$constructor->getParameters():取构造函数参数,通过 ReflectionParameter 数组返回参数列表
            foreach ($constructor->getParameters() as $param){
               //获取反射类
                $c=$param->getClass();
                /*
                 var_dump($c);
                 object(ReflectionClass)[5]
                     public 'name' => string 'EmailSenderBy163' (length=16)
                 * */
                //如果构造方法有入参，迭代并递归创建依赖类实例
                if($c!=null){
                    $dependencies[]=$this->get($c->getName());
                    /*获取类名
                      var_dump($c->getName());
                      string 'EmailSenderBy163' (length=16)
                     * */
                }
            }
        }
        foreach ($params as $index=>$param){
            $dependencies[$index]=$param;
        }
        /*
         * var_dump($dependencies);die;
         array (size=1)
        'EmailSenderBy163' => string 'this is name' (length=12)
         * */

        //最后根据创建的参数创建实例，完成依赖的注入
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
            [_name:EmailSenderBy163:private] =>this is name
        )

)
 * */