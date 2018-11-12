<?php
	$pdo = new PDO ( 'mysql:host=localhost;dbname=taskeai;charset=utf8', 'root', 'vagrant' );
	
	$sql = $pdo->query ( 'select * from taskeai.user' );

	print" <!--ファイルからの場合-->		
	<script src=\"js/Chart_min.js\"></script>
	";

	foreach ( $sql->fetchAll () as $row ) {
	    print("<hr size=\"8\" color=\"#333333\">");
		print"<font size=\"6\"color=\"#333631\"><center>${row['uname']}</center></font>";
		print"<canvas id=\"myChart${row['uid']}\"></canvas><br>
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

	$par = round($donenum/$allnum * 100);

	print"
		]
    }]
  },
  options: {
	animation:false
  }
});
	</script>
	<h4>
	達成度：${par}%
	";

    if($par == 100){
        print"<font color=\"red\">  Completed!</font>";
    }
	print"
	</h4>
	<br>";
	}
?>