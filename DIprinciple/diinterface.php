<?php
interface  EmailSender{
    public function sender();
}
class  EmailSenderByQq implements  EmailSender {
    public function sender()
    {
        
    }
}
class  EmailSenderBy163 implements  EmailSender {
    public function sender()
    {

    }
}
class  User{
    public  $emailSenderClass;
    //$emailSenderObject必须是实现EmailSender接口的子类
    public function __construct(EmailSender $emailSenderObject)
    {
         $this->emailSenderClass=$emailSenderObject;
    }

    public function register()
    {
        $this->emailSenderClass->sender();
    }
}
$user=new User(new EmailSenderBy163());
$user->register();     