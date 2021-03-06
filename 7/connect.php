<?php

$dsn = 'mysql:dbname=sample;host=localhost;charset=utf8';
$user = 'root';
$password = '';
$email = 'prepare@statement.com';

try{

    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE user SET email = :email WHERE id = 3";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email',$email, PDO::PARAM_STR);
    $stmt->execute();

    /*接続だけを確認する場合、以上3行は不要でした。
    「Connection failed:SQLSTATE[42000]: Syntax error or access violation: 1065 Query was empty」というエラーが出ますので削除してお試しください。*/
    echo '接続に成功しています';

}catch (PDOException $e){
    print('Connection failed:'.$e->getMessage());
    die();
}
