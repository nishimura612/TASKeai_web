<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>JavaScriptの練習</title>
</head>
<body>
	<!--webの場合					
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
	-->
<?php
	$pdo = new PDO ( 'mysql:host=localhost;dbname=taskeai;charset=utf8', 'root', 'vagrant' );
	//$sql = $pdo->query ( 'select * from taskeai.user join taskeai.task using(uid)' );
	
	$sql = $pdo->query ( 'select * from taskeai.user' );

	print" <!--ファイルからの場合-->		
	<script src=\"Chart_min.js\"></script>
	";

	foreach ( $sql->fetchAll () as $row ) {
		print"<h2>${row['uname']}<h2>";
		print"<canvas id=\"myChart${row['uid']}\"></canvas>
			<script>
			var ctx = document.getElementById(\"myChart${row['uid']}\").getContext('2d');
			var myChart = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: [\"完了したタスク\", \"実行中\"],
				datasets: [{
				//色生成
				backgroundColor: [
				\"#3498db\",
				\"#e74c3c\",
				],
			data: [	";

		//データ作成
		$sql2= $pdo->query ( "select count(*) as num from taskeai.task where uid = ${row['uid']} " );
		$allnum;
		foreach ( $sql2->fetchAll () as $row2 ) {
			$allnum = $row2['num'];
		}

		$sql2= $pdo->query ( "select count(*) as num from taskeai.task where uid = ${row['uid']} and (done != \"0000-00-00 00:00:00\" and done is  not null)" );
		$donenum;
		foreach ( $sql2->fetchAll () as $row2 ) {
			$donenum = $row2['num'];
		}
		print "${donenum},${allnum}- ${donenum}";
	
	print"
		]
    }]
  }
});


	</script>";
	}
?>
</body>
</html>
