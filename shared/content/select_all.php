<?php
$pdo = new PDO ( 'mysql:host=localhost;dbname=taskeai;charset=utf8', 'root', 'vagrant' );
$sql = $pdo->query ( 'select * from taskeai.user join taskeai.task using(uid)' );

print("
    <tbody>
        <button type=\"button\" class=\"btn btn-primary rounded-circle p-0\" style=\"width:4rem;height:4rem;\">task＋</button>
                   
        <tr>
        <th>チェック</th>
		<th>項目</th>
		<th>期限</th>
        <th>実施者</th>
        <th>実行中/完了</th>
        <th>完了日時</th>
        </tr>");
                    
foreach ( $sql->fetchAll () as $row ) {
  print("<tr>
  <td><div class=\"custom-control custom-checkbox text-center\">
  <input type=\"checkbox\" class=\"custom-control-input\" id=\"customCheck${row['tid']}\">
  <label class=\"custom-control-label\" for=\"customCheck${row['tid']}\">　</label>
  </div></td>");
    				
  print("<td> ${row['tname']} </td>");
    		
  print("<td> ${row['timelimit']} </td>");

  print("<td> ${row['uname']} </td>");

  $tid =  $row['tid'];
  $done = $row['done'];
  if(${done} != ""  and ${done} != "0000-00-00 00:00:00"){
    //if(true){
    print("<td> 完了 </td>");
    print("<td> ${done} </td>");
  }else{
    print("<td> 実行中 </td>");
    print("<td> <input type=\"button\" value=\"完了\" onclick=\"done_update(${tid})\"/> </td>");
  }
  print('</tr>');
}

print("</tbody>");

?>
