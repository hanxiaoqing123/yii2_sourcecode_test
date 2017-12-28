<?php
/**
 * Created by PhpStorm.
 * User: nahuanjie
 * Date: 2017/12/27
 * Time: 10:05
 */
/*响应*/
header("HTTP/1.1 404 Not Found");

echo "hello world";
/*
 C:\wamp64\www\yii2_sourcecode_test>curl -i XGET http://localhost/yii2_sourcecode
_test/test.php
curl: (6) Could not resolve host: XGET
HTTP/1.1 404 Not Found
Date: Wed, 27 Dec 2017 02:07:46 GMT
Server: Apache/2.4.27 (Win64) PHP/5.6.31
X-Powered-By: PHP/5.6.31
Content-Length: 11
Content-Type: text/html; charset=UTF-8

hello world
 * */