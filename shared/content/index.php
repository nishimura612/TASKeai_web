<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- 追加CSS -->
<link rel="stylesheet" href="css/custom.css">
<title>TASKeai</title>
</head>
<body>
<!-- ヘッダー -->
<header class="py-2">
  <div class="container text-center">
    <h1><a href="index.php"><img src="img/logo.png" alt="TASKeai" height="100"></a></h1>
  </div>
</header>
<!-- /ヘッダー -->
<!-- ナビゲーションバー -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
  <div class="container">
    <!-- サブコンポーネント -->
    <!-- 切替ボタン -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <!-- ナビゲーション -->
    <div class="collapse navbar-collapse" id="navbar-content">
      <!-- ナビゲーションメニュー -->
      <!-- 左側メニュー：トップページの各コンテンツへのリンク -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Top</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="insert_user_sql.php">タスク登録</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="insert_user.php">ユーザー登録</a>
        </li>
        <!-- ドロップダウン -->
      </ul>
      <!-- /ナビゲーションメニュー -->
    </div>
    <!-- /サブコンポーネント -->
  </div>
</nav>
<!-- /ナビゲーションバー -->
<!-- メイン -->
<main>
  <!-- メインビジュアル --><!-- / メインビジュアル -->
  <!-- コンテンツ01 --><!-- /コンテンツ01 -->
  <!-- コンテンツ02 --><!-- /コンテンツ02 -->
  <!-- コンテンツ03 -->
  <div class="py-4">
    <section id="menu">
      <div class="container">
        <h3 class="mb-3">タスク</h3>
        <!-- タブ型ナビゲーション -->
        <div class="nav nav-tabs" id="tab-menus" role="tablist">
          <!-- タブ01 -->
          <a class="nav-item nav-link active" id="tab-menu01" data-toggle="tab" href="#panel-menu01" role="tab" aria-controls="panel-menu01" aria-selected="true">一覧</a>
          <!-- タブ02 -->
          <a class="nav-item nav-link" id="tab-menu02" data-toggle="tab" href="#panel-menu02" role="tab" aria-controls="panel-menu02" aria-selected="false">グラフ</a>
        </div>
        <!-- /タブ型ナビゲーション -->
        <!-- パネル -->
        <div class="tab-content" id="panel-menus">
          <!-- パネル01 -->
          <div class="tab-pane fade show active border border-top-0" id="panel-menu01" role="tabpanel" aria-labelledby="tab-menu01">
            <div class="row p-3">
              <div class="col-md-7 order-md-2">
                <table class="table table-striped">
                  <tbody>
        <button type="button" class="btn btn-primary rounded-circle p-0" style="width:4rem;height:4rem;">task＋</button>
                    <tr>
                      <th>チェック</th>
				　 　 <th>項目</th>
				　 　 <th>期限</th>
                      <th>実施者</th>
                      <th>実行中/完了</th>
                    </tr>
                    
<?php
			$pdo = new PDO ( 'mysql:host=localhost;dbname=taskeai;charset=utf8', 'root', 'vagrant' );
			$sql = $pdo->query ( 'select * from taskeai.user join taskeai.task using(uid)' );

			foreach ( $sql->fetchAll () as $row ) {
			    print("<tr>
				　 　　<td><div class=\"custom-control custom-checkbox text-center\">
                        <input type=\"checkbox\" class=\"custom-control-input\" id=\"customCheck${row['tid']}\">
                        <label class=\"custom-control-label\" for=\"customCheck${row['tid']}\">　</label>
                        </div></td>");
    			
    		
    			print("<td> ${row['tname']} </td>");
    		
    			print("<td> ${row['timelimit']} </td>");

    			print("<td> ${row['uname']} </td>");

                $done = $row['done'];
                if(${done} != ""  and ${done} != "0000-00-00 00:00:00"){
                //if(true){
    			    print("<td> 完了 </td>");
    			}else{
                    print("<td> 実行中 </td>");
    			}
    			print('</tr>');
			}

?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- パネル02 -->
          <div class="tab-pane fade border border-top-0" id="panel-menu02" role="tabpanel" aria-labelledby="tab-menu02">
            <div class="row p-3">
              <div class="col-md-7 order-md-2">
              <h4>実行中</h4>
                <?php
	                //$pdo = new PDO ( 'mysql:host=localhost;dbname=taskeai;charset=utf8', 'root', 'vagrant' );
	                $sql = $pdo->query ( 'select * from taskeai.user' );
            
                    print" 		
	                    <script src=\"js/Chart_min.js\"></script>
	                        <canvas id=\"all_no_done\"></canvas>
	                    <script>
		                var ctx = document.getElementById(\"all_no_done\").getContext('2d');
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
		print "${allnum}-${donenum},";
	}

	print"
		]
    }]
  }
});
	</script>";

?>

<h4>完了</h4>
<?php
	//$sql = $pdo->query ( 'select * from taskeai.user join taskeai.task using(uid)' );
	
	$sql = $pdo->query ( 'select * from taskeai.user' );

	print" <!--ファイルからの場合-->		
	<script src=\"Chart_min.js\"></script>
	
	<canvas id=\"all_done\"></canvas>
	<script>
		var ctx = document.getElementById(\"all_done\").getContext('2d');
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
                
              </div>
            </div>
          </div>
          
        <!-- /パネル -->
      </div>
    </section>
  </div>
  <!-- /コンテンツ03 -->
  <!-- コンテンツ04 -->
  <div class="py-4 bg-light">
    <section id="coupon">
      <div class="container">
        <div class="card text-center text-dark w-75 mx-auto">
          <div class="card-body">
            <h3 class="text-center mb-3">Light</h3>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-secondary active">
                    <input type="radio" name="options22" id="option1" autocomplete="off" checked> ON
                  </label>
                  <label class="btn btn-secondary">
                    <input type="radio" name="options" id="option2" autocomplete="off"> OFF
                  </label>
                </div>
                </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- /コンテンツ04 -->
  <!-- コンテンツ05 --><!-- /コンテンツ05 -->
</main>
<!-- /メイン -->
<!-- フッター -->
<footer class="py-4 bg-danger text-light">
  <div class="container text-center">
    <!-- ナビゲーション --><!-- /ナビゲーション -->
    <p>
      <small>Copyright &copy;2018 uRL, All Rights Reserved.</small>
    </p>
  </div>
</footer>
<!-- /フッター -->
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
