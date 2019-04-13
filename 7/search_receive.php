<?php

$dsn = 'mysql:dbname=sample;host=localhost;charset=utf8';
$user = 'root';
$password = '';
$data =[];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
}


try{

    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT id, name FROM user WHERE name LIKE :name";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name','%'.$name.'%', PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $data[] = $row;
    }

    /*接続だけを確認する場合、以上3行は不要でした。
    「Connection failed:SQLSTATE[42000]: Syntax error or access violation: 1065 Query was empty」というエラーが出ますので削除してお試しください。*/

}catch (PDOException $e){
    echo($e->getMessage());
    die();
}
?>
<html>
<body>
  <h1>会員データ</h1>
  <p><?php echo $count;?>件見つかりました。</p>
  <table border=1>
    <tr><th>id</th><th>名前</th></tr>
    <?php foreach ($data as $row): ?>
      <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['name'];?></td>
      </tr>
    <?php endforeach;?>
  </table>
</body>
</html>
