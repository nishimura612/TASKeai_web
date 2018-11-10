<html>
<head></head>
<body>

<?php
  $check = implode(", ", $_POST['check.value']);
print("${check}");
?>

<form action="index.php">
  <input type="submit" value="戻る" />
</form>

</body>
</html>
