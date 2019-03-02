<?php

$dsn = 'mysql:dbname=sample;host=localhost;charset=utf8';
$user = 'root';
$password = '';
$email = 'prepare@statement.com';

try{

    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM user";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $data = array();
    $count =$stmt->rowCount();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $data[] = $row;
    }

    /*接続だけを確認する場合、以上3行は不要でした。
    「Connection failed:SQLSTATE[42000]: Syntax error or access violation: 1065 Query was empty」というエラーが出ますので削除してお試しください。*/
    echo '処理が終了しました。';

}catch (PDOException $e){
    print($e->getMessage());
    die();
}
var_dump($count);
var_dump($data);
