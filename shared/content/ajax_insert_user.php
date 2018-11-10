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
        <h3 class="mb-3">ユーザー登録</h3>
        
        <form action = "insert_user_sql.php"method = "post">
            <p>ユーザ名</p>
            <input id="uname" type = "text" name ="uname"><br/>
            <button id="submit-user" type="button" name="submit-user" value="">
              <font size="4">送信</font>
            </button>
        </form>
          
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
                  <label id="light-on" class="btn btn-secondary active">
                    <input type="radio" name="options22" id="option1" autocomplete="off" checked="checked"> ON
                  </label>
                  <label id="light-off" class="btn btn-secondary">
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
<!--
<script src="js/jquery-3.3.1.slim.min.js"></script> -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
$(function() {

  // ユーザー登録
    $("#submit-user").click(function(){
        uname = $("#uname").val();
        $.ajax({
            type: "POST",   // 通信の種類
            url: "insert_user_sql.php", // POSTデータを送るURL
            data: { // POSTデータの中身
                "uname": uname
            },
            success: function(j_data){
                // 通信が成功した場合の処理
            },
            error: function(){
                alert("通信エラー")
            }
        });
        // submit による画面リロード防止
        return false;
    });

    $("#light-on").click(function(){
      $.ajax({
        type: "POST",
        url: "http://192.168.0.8/blinklight.php", // raspberry pi のipを指定
        data: {
          "stateLight": "ON"
        },
        error: function(){
                alert("ライト通信エラー")
        }
      });
      // submit による画面リロード防止
      return false;
    });

    $("#light-off").click(function(){
      $.ajax({
        type: "POST",
        url: "http://192.168.0.8/blinklight.php", // raspberry pi のipを指定
        data: {
          "stateLight": "OFF"
        },
        error: function(){
                alert("ライト通信エラー")
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
