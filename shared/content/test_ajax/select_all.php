<?php
$pdo = new PDO ( 'mysql:host=localhost;dbname=taskeai;charset=utf8', 'root', 'vagrant' );
$sql = $pdo->query ( 'select * from taskeai.user join taskeai.task using(uid)' );

print('<table>');
print('<tr><td>uid</td><td>uname</td><td>tid</td><td>tname</td><td>done</td><td>timelimit</td></tr>');
foreach ( $sql->fetchAll () as $row ) {
    print('<tr>');
    print("<td> ${row['uid']} </td>");
    print("<td> ${row['uname']} </td>");
    print("<td> ${row['tid']} </td>");
    print("<td> ${row['tname']} </td>");
    print("<td> ${row['done']} </td>");
    print("<td> ${row['timelimit']} </td>");
    print('</tr>');
}
print('</table>');

?>
