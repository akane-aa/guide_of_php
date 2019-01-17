<?php

$time = date('G');

if($time < 12){
    echo '午前です。';
}elseif ($time >= 12) {
    echo '午後です。';
}
?>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
  <p>今の時間は<?php echo $time;?>です。</p>
</body>
</html>
