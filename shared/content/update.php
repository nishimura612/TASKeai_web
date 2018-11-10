<html>
<head></head>
<body>

<?php
  $taskid = implode(", ", $_POST['check']);
	$task = explode(",", $taskid);
  print("taskid  = ${taskid}<br>");
  $receive_user = $_POST['user'];
  print("userid = ${receive_user}");

 $pdo = new PDO ( 'mysql:host=localhost;dbname=taskeai;charset=utf8', 'root', 'vagrant' );
$sql = $pdo->query ( 'select * from taskeai.task' );

print('<table>');
print('<tr><td>tid</td><td>tname</td><td>uid</td><td>done</td><td>timelimit</td></tr>');
foreach ( $sql->fetchAll () as $row ) {
    print('<tr>');
    print("<td> ${row['tid']} </td>");
    print("<td> ${row['tname']} </td>");
    print("<td> ${row['uid']} </td>");
    print("<td> ${row['done']} </td>");
    print("<td> ${row['timelimit']} </td>");
    print('</tr>');
}
print('</table>');


	foreach($task as $num){
  	$sql = $pdo->query( "update taskeai.task SET uid=${receive_user} where tid=${num} ");
	}
echo '更新完了しました';


$sql = $pdo->query ( 'select * from taskeai.task' );

print('<table>');
print('<tr><td>tid</td><td>tname</td><td>uid</td><td>done</td><td>timelimit</td></tr>');
foreach ( $sql->fetchAll () as $row ) {
    print('<tr>');
    print("<td> ${row['tid']} </td>");
    print("<td> ${row['tname']} </td>");
    print("<td> ${row['uid']} </td>");
    print("<td> ${row['done']} </td>");
    print("<td> ${row['timelimit']} </td>");
    print('</tr>');
}
print('</table>');
?>

<form action="index.php">
  <input type="submit" value="戻る" />
</form>

</body>
</html>
