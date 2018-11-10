
<?php
$tid = $_POST['tid'];
$uid = $_POST['uid'];

$pdo = new PDO ( 'mysql:host=localhost;dbname=taskeai;charset=utf8', 'root', 'vagrant' );
 
$sql = $pdo->query("update taskeai.task set uid = \"${uid}\" where tid = ${tid} ");

?>

