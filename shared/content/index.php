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

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/light-control.js"></script>
	<script>
		function selectAll() {
                //ここからajaxの処理です。          
                $.ajax({
                        //POST通信
                        type: "POST",
                        //ここでデータの送信先URLを指定します。
                        url: "select_all.php",
                        //処理が成功したら
                        success : function(data, dataType) {
                            //HTMLファイル内の該当箇所にレスポンスデータを追加します。
                            $('#select_all').html(data);
                            setTimeout( selectAll , 5000 );
                        },
                        //処理がエラーであれば
                        error : function() {
                            alert('通信エラー');
                        }
                 });
                 
                 //submitによる画面リロードを防いでいます。
                 return false;
    	}
    	function selectNoDone() {
                //ここからajaxの処理です。          
                $.ajax({
                        //POST通信
                        type: "POST",
                        //ここでデータの送信先URLを指定します。
                        url: "all_no_done.php",
                        //処理が成功したら
                        success : function(data, dataType) {
                            //HTMLファイル内の該当箇所にレスポンスデータを追加します。
                            $('#all_no_done').html(data);
                            setTimeout( selectNoDone , 5000 );
                        },
                        //処理がエラーであれば
                        error : function() {
                            alert('通信エラー');
                        }
                 });
                 
                 //submitによる画面リロードを防いでいます。
                 return false;
    	}
    	function selectDone() {
                //ここからajaxの処理です。          
                $.ajax({
                        //POST通信
                        type: "POST",
                        //ここでデータの送信先URLを指定します。
                        url: "all_done.php",
                        //処理が成功したら
                        success : function(data, dataType) {
                            //HTMLファイル内の該当箇所にレスポンスデータを追加します。
                            $('#all_done').html(data);
                            setTimeout( selectDone , 5000 );
                        },
                        //処理がエラーであれば
                        error : function() {
                            alert('通信エラー');
                        }
                 });
                 
                 //submitによる画面リロードを防いでいます。
                 return false;
    	}

    	function selectUser() {
                //ここからajaxの処理です。          
                $.ajax({
                        //POST通信
                        type: "POST",
                        //ここでデータの送信先URLを指定します。
                        url: "all_user.php",
                        //処理が成功したら
                        success : function(data, dataType) {
                            //HTMLファイル内の該当箇所にレスポンスデータを追加します。
                            $('#all_user').html(data);
                            setTimeout( selectUser , 5000 );
                        },
                        //処理がエラーであれば
                        error : function() {
                            alert('通信エラー');
                        }
                 });
                 
                 //submitによる画面リロードを防いでいます。
                 return false;
    	}
       selectAll();
       selectNoDone();
       selectDone();
       selectUser();

       function done_update(tid){
       
            $.ajax({
                type: "POST",   // 通信の種類
                url: "done_update.php", // POSTデータを送るURL
                data: { // POSTデータの中身
                    "tid": tid
                },
                success: function(j_data){
                    // 通信が成功した場合の処理
                },
                error: function(){
                    alert("通信エラー");
                }
            });
            // submit による画面リロード防止
            return false;
       }

       function userChange(tid){

            var num = document.getElementById("form"+tid).user.selectedIndex;
            var uid = document.getElementById("form"+tid).user.options[num].value;
            
            $.ajax({
                type: "POST",   // 通信の種類
                url: "user_update.php", // POSTデータを送るURL
                data: { // POSTデータの中身
                    "tid": tid,
                    "uid": uid
                },
                success: function(j_data){
                    // 通信が成功した場合の処理
                },
                error: function(){
                    alert("通信エラー");
                }
            });
            // submit による画面リロード防止
            return false;
       }
</script>
	
<!-- ヘッダー -->
<header class="py-2">
  <div class="container text-center">
    <h1><a href="index.php"><img src="img/logo.png" alt="TASKeai" height="100"></a></h1>
  </div>
</header>
<!-- /ヘッダー -->
<!-- ナビゲーションバー -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
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
          <a class="nav-link" href="insert_task.php">タスク登録</a>
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
              <div class="order-md-2">
                <table class="table table-striped" id="select_all">
                  
                </table>
              </div>
            </div>
          </div>
          <!-- パネル02 -->
          <div class="tab-pane fade border border-top-0" id="panel-menu02" role="tabpanel" aria-labelledby="tab-menu02">
            <div class="row p-3">
              <div class="col-md-7 order-md-2">
              
              <font size="6"color="#333631"><center>実行中<center></font>
              <div id="all_no_done"></div>
              <br>
              
              <hr size=\"8\" color=\"#333333\">
              
              <font size="6"color="#333631"><center>完了<center></font>
              <div id="all_done"></div>
              <br><br>
                
              <div id="all_user"></div>
                
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
            <h1 class="text-center mb-3">Light</h1>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label id="light-on" class="btn btn-secondary btn-lg active">
                    <input type="radio" name="options22" id="option1" autocomplete="off" checked> ON
                  </label>
                  <label id="light-off" class="btn btn-secondary btn-lg">
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
<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>
