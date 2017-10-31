<?php
Yii::setAlias('@common', dirname(__DIR__));   //setAlias定义别名，保存在Yii::$aliases属性上
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
