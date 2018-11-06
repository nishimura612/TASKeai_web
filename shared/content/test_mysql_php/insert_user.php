
<?php
$uid = $_POST['uid'];
$uname = $_POST['uname'];

$pdo = new PDO ( 'mysql:host=localhost;dbname=taskeai;charset=utf8', 'root', 'vagrant' );

if($uid == ""){
    $sql = $pdo->query("select max(uid) as maxuid from taskeai.user" );
    $uid = intval($sql->fetchColumn()) + 1;
} 
$sql = $pdo->query("insert into taskeai.user(uid,uname) values(${uid}, \"${uname}\")");

?>

<html>
<head></head>
<body>

<form action="insert.html">
  <input type="submit" value="戻る" />
</form>

</body>
</html>
