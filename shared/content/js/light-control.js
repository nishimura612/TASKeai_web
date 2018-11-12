$(function() {
    rpiAddress = "http://192.168.0.8/blinklight.php" // raspberry pi のipを指定
      $("#light-on").click(function(){
        $.ajax({
          type: "POST",
          url: rpiAddress, 
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
          url: rpiAddress,
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