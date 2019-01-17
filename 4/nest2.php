<?php

$attend = 1;
$place = 'b';

if($attend === 0){
  echo 'パーティーを欠席にて承りました。';
  if($place === 'a'){
    echo '会場はAホテルです。';
  }elseif ($place === 'b') {
    echo '会場はBホテルです。';
  }
}elseif($attend === 1){
  echo 'パーティーを出席にて承りました。'
}
