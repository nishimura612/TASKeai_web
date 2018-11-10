<?php
    $pdo = new PDO ( 'mysql:host=localhost;dbname=taskeai;charset=utf8', 'root', 'vagrant' );

	$sql = $pdo->query ( 'select * from taskeai.user join taskeai.task using(uid)' );
	
	$sql = $pdo->query ( 'select * from taskeai.user' );

	print" <!--ファイルからの場合-->		
	<script src=\"js/Chart_min.js\"></script>
	
	<canvas id=\"canvas_all_done\"></canvas>
	<script>
		var ctx = document.getElementById(\"canvas_all_done\").getContext('2d');
		var myChart = new Chart(ctx, {
		type: 'doughnut',
		data: {
			labels: [ ";
	//人物登録
	foreach ( $sql->fetchAll () as $row ) {
		print("\"${row['uname']}\",");
	}
			
			print"],
			datasets: [{
			//色生成
			backgroundColor: [
 			\"#2ecc71\",
			\"#3498db\",
			\"#95a5a6\",
			\"#9b59b6\",
			\"#f1c40f\",
			\"#e74c3c\",
			\"#34495e\"
			],
		data: [	";

	//データ作成
	$sql = $pdo->query ( 'select * from taskeai.user' );
	foreach ( $sql->fetchAll () as $row ) {
	$sql2= $pdo->query ( "select count(*) as num from taskeai.task where uid = ${row['uid']} and (done != \"0000-00-00 00:00:00\" and done is  not null)" );
		$donenum;
		foreach ( $sql2->fetchAll () as $row2 ) {
			$donenum = $row2['num'];
		}
		print "${donenum},";
	}

	print"
		]
    }]
  }
});
	</script>";

?>