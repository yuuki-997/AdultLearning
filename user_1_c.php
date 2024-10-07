<?php
session_start();
//※htdocsと同じ階層に「includes」を作成してfuncs.phpを入れましょう！
//include "../../includes/funcs.php";
include "funcs.php";
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>USERデータ登録 確認</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->

<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="user_insert_1.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ユーザー登録 確認</legend>
     <label>名前：<?php echo h($_POST['name']); ?></label><br>
     <input type="hidden" name="name" value="<?php echo h($_POST['name']); ?>">
     
     <label>Login ID: <?php echo h($_POST['lid']); ?></label><br>
     <input type="hidden" name="lid" value="<?php echo h($_POST['lid']); ?>">
     
     <label>Login PW: <?php echo h($_POST['lpw']); ?></label><br>
     <input type="hidden" name="lpw" value="<?php echo h($_POST['lpw']); ?>">
     
     <label>管理FLG: 
     <?php echo ($_POST['kanri_flg'] == "1") ? "管理者" : "一般"; ?>
     </label><br>
     <input type="hidden" name="kanri_flg" value="<?php echo h($_POST['kanri_flg']); ?>">
     
     <button type="button" onclick="history.back(-1)">戻る</button>
     <input type="submit" value="登録">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
