<?php
class  EmailSenderBy163{
    public function send()
    {
        
    }
    
}

class  User{
    public  $emailSenderClass;

    public function register()
    {
        $this->emailSenderClass->send();
        
    }
}
//我们把User类依赖的EmailSenderBy163对象，以属性传递进去，降低User类对EmailSenderBy163对象的依赖
$user=new User();
$user->emailSenderClass=new EmailSenderBy163();
$user->register();