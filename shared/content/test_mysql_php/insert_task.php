
<?php
$tid = $_POST['tid'];
$tname = $_POST['tname'];
$uid = $_POST['uid'];
$done = $_POST['done'];
$timelimit = $_POST['timelimit'];


$pdo = new PDO ( 'mysql:host=localhost;dbname=taskeai;charset=utf8', 'root', 'vagrant' );

if($tid == ""){
    $sql = $pdo->query("select max(tid) as maxuid from taskeai.task" );
    $tid = intval($sql->fetchColumn()) + 1;
} 

if($done == ""){
    $sql = $pdo->query("insert into taskeai.task(tid,tname,uid,timelimit) values(${tid},\"${tname}\",${uid},\"${timelimit}\")");
}else{
    $sql = $pdo->query("insert into taskeai.task(tid,tname,uid,done,timelimit) values(${tid},\"${tname}\",${uid},\"${done}\",\"${timelimit}\")");

}
?>

<html>
<head></head>
<body>

<form action="insert.html">
  <input type="submit" value="戻る" />
</form>

</body>
</html>
