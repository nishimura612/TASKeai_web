<?php
$pdo = new PDO ( 'mysql:host=localhost;dbname=taskeai;charset=utf8', 'root', 'vagrant' );
$sql = $pdo->query ( 'select * from taskeai.task join taskeai.user using(uid) order by tname' );

print("
    <tbody>           
        <tr>
		<th>タスク内容</th>
		<th>期限</th>
        <th>実施者</th>
        <th>実行中/完了</th>
        <th>完了日時</th>
        </tr>");
                    
foreach ( $sql->fetchAll () as $row ) {
 
    				
  print("<td> ${row['tname']} </td>");
    		
  print("<td> ${row['timelimit']} </td>");


  $tid =  $row['tid'];
  $done = $row['done'];
  if(${done} != ""  and ${done} != "0000-00-00 00:00:00"){
    print("<td> ${row['uname']} </td>");
    print("<td> 完了 </td>");
    print("<td> ${done} </td>");
  }else{
    $sql2 = $pdo->query ( 'select * from taskeai.user' );

    $uid = $row['uid'];
    print("<td>
        <form  id=\"form${tid}\" name=\"form${tid}\" action=\"\">
        <select id=\"user\" onchange=\"userChange(${tid})\"> ");
        
    foreach ( $sql2->fetchAll () as $row2 ) {
        $uid2 = $row2['uid'];
        if($uid == $uid2){
            print("<option value=\"${uid2}\" selected>${row2['uname']}</option>");
        }else{
            print("<option value=\"${uid2}\">${row2['uname']}</option>");
        }
    }
    print("</select> </form> </td>");
    
    print("<td> 実行中 </td>");
    print("<td> <input type=\"button\" value=\"完了\" onclick=\"done_update(${tid})\"/> </td>");
  }
  print('</tr>');
}

print("</tbody>");

?>
