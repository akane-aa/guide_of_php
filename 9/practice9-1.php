<?php

$str1 = '0120';
$str2 = '090';

$result1 = preg_match('/\A([0-9]{4})\z/',$str1);
$result2 = preg_match('/\A([0-9]{4})\z/',$str2);

var_dump($result1);
var_dump($result2);

 ?>
