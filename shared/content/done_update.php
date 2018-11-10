
<?php
$tid = $_POST['tid'];

$pdo = new PDO ( 'mysql:host=localhost;dbname=taskeai;charset=utf8', 'root', 'vagrant' );
 
$done = date("Y-m-d H:i:s");
$sql = $pdo->query("update taskeai.task set done = \"${done}\" where tid = ${tid} ");

?>

