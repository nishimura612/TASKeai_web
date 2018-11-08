﻿<!DOCTYPE html>
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
	print" <!--ファイルからの場合-->		
	<script src=\"Chart_min.js\"></script>
	
	<canvas id=\"myChart\"></canvas>
	<script>
		var ctx = document.getElementById(\"myChart\").getContext('2d');
		var myChart = new Chart(ctx, {
		type: 'doughnut',
		data: {
			labels: [\"母\", \"父\", \"兄\", \"妹\", \"姉\", \"弟\"],
			datasets: [{
			backgroundColor: [
 			\"#2ecc71\",
			\"#3498db\",
			\"#95a5a6\",
			\"#9b59b6\",
			\"#f1c40f\",
			\"#e74c3c\",
			\"#34495e\"
			],
		data: [12, 19, 3, 17, 28, 24]
    }]
  }
});
	</script>
?>
</body>
</html>
