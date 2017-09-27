<?php
class EmailSenderByQq{
    public function send()
    {

    }

}

class User{
    private $_emailSenderObject;

    public function __construct($emailSenderObject)
    {
        $this->_emailSenderObject=$emailSenderObject;
    }

    public function register()
    {
       $this->_emailSenderObject->send();
    }
}
//我们把User类依赖的EmailSenderByQq对象，以构造函数的参数传递进去，降低User类对EmailSenderByQq对象的依赖
$emailSenderObject=new EmailSenderByQq();
$user=new User($emailSenderObject);
$user->register();


