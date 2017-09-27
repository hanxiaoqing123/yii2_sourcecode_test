<?php
class EmailSenderByQq{
    public function send()
    {
        
    }
    
}
class User{
    //调用User类的register方法注册成功后，实例化邮件类EmailSenderByQq并调用邮件方法发送邮件
    public function register()
    {
        $email=new EmailSenderByQq();
        $email->send();
        
    }
}