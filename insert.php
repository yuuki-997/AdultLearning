<?php
session_start();
$user_name = $_SESSION["name"];      // セッション内のユーザー名
$user_id = $_SESSION["id"];   
//1. POSTデータ取得
$name   = $_POST["name"];
$email  = $_POST["email"];
$naiyou = $_POST["naiyou"];

//2. DB接続します(エラー処理追加)
include("funcs.php");
$pdo = db_conn();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_an_table(name, email, naiyou, user_id, user_name, indate) VALUES(:name, :email, :naiyou, :user_id, :user_name, sysdate())");
$stmt->bindValue(':name', $name);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':naiyou', $naiyou);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);  // ユーザーIDをデータベースに保存
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);  // ユーザー名をデータベースに保存
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  echo "false";
}else{
  echo "記録しました";
}
?>
<!-- <script>
$("#name").val("");
$("#email").val("");
$("#naiyou").val("");
</script> -->