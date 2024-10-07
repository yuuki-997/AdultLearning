<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>学習を記録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
  <div id="status">学習記録フォーム</div>
  <div class="jumbotron">
   <fieldset>
    <legend>学習記録</legend>
     <label>学習分類：<input type="text" id="name"></label><br>
     <label>時間(分)：<input type="text" id="email"></label><br>
     <label><textArea id="naiyou" rows="4" cols="40"></textArea></label><br>
     <button id="btn">送信</button>
    </fieldset>
  </div>
<!-- Main[End] -->



<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
//登録ボタンをクリック
$("#btn").on("click",function() {
    //axiosでAjax送信（非同期通信）

    //送信データをオブジェクト変数で用意！
    const params = new URLSearchParams();
    params.append('name',  $("#name").val());
    params.append('email', $("#email").val());
    params.append('naiyou',$("#naiyou").val());

    //axiosでAjax送信
    axios.post('insert.php',params).then(function (response) {
        console.log(typeof response.data);//通信OK
        if(response.data==true){
           $("#status").html(response.data);
        }
    }).catch(function (error) {
        console.log(error);//通信Error
    }).then(function () {
        console.log("Last");//通信OK/Error後に処理を必ずさせたい場合
    });
});
</script>

</body>
</html>
