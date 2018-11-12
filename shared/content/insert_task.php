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
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container">
    <!-- サブコンポーネント -->
    <!-- 切替ボタン -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" ari
a-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
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
        <!-- <h3 class="mb-3">タスク登録</h3> -->
        <!-- <p>タスク名</p>
        <input id="tname" type = "text" name ="tname"><br/>
        <p>ユーザー名</p>
        <input id="uname" type = "text" name ="uname"><br/>
        <p>期限</p>
        <input id="timelimit" type = "text" name ="timelimit"><br/>
        <button id="submit-task" type="button" name="submit-task" value="">
            <font size="4">登録</font>
        </button>
   
        <div id="res"></div> -->

        <div class="col-sm-6 col-md-6">
          <h3 class="mb-3">タスク登録</h3>

          <label for="userName">タスク名</label>
          <input type="text" class="form-control" id="tname" placeholder="" value="" required="">
          <div class="invalid-feedback">
            Valid first tname is required.
          </div>
          <br>
          <label for="userName">ユーザー名</label>
          <input type="text" class="form-control" id="uname" placeholder="" value="" required="">
          <div class="invalid-feedback">
            Valid first tname is required.
          </div>
          <br>
          <label for="userName">期限</label>
          <input type="text" class="form-control" id="timelimit" placeholder="例:2018-11-13 10:00:00" value="" required="">
          <div class="invalid-feedback">
            Valid first tname is required.
          </div>
          <br>
          <button type="button" class="btn btn-primary" id="submit-task">登録</button>
          <br>
          <br>
          <div id="res"></div>
        </div>
          
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

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
$(function() {

    $("#submit-task").click(function(){
        tname = $("#tname").val();
        uname = $("#uname").val();
        done = $("#done").val();
        timelimit = $("#timelimit").val();
        $.ajax({
            type: "POST",   // 通信の種類
            url: "insert_task_sql.php", // POSTデータを送るURL
            data: { // POSTデータの中身
                "tname": tname,
                "uname": uname,
                "done": done,
                "timelimit": timelimit
            },
            success: function(j_data){
                // 通信が成功した場合の処理
                $('#res').html("<p>"+ tname +"を追加しました<p>");
            },
            error: function(){
                //alert("通信エラー");
                $('#res').html("<p>失敗<p>");
            }
        });
        // submit による画面リロード防止
        return false;
    });
});
</script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
