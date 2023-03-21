<?php

// SESSION開始！！
session_start();
// 関数群の読み込み
require_once('funcs.php');
// ログインチェック処理！
loginCheck();


$lid = $_SESSION['lid'];

// 関数ファイルでreturnで外に出した$pdoを使う
$pdo = db_conn();


//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM register00_photo where lid = :lid');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();


//データ登録処理後  ※コピペ
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
// データが取得できた場合の処理  1件のみなのでwhile文は不要
$result = $stmt->fetch();

};


?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">

    <title>【 Selfy 】「私の写真」の登録</title>

</head>

<body>

<h1>「私の写真」の登録</h1>
    
<form method="POST" action="update00_photo.php" id="photo" name="photo" enctype="multipart/form-data">


<section id="photo_01">
        <h2>【1/1】私の写真</h2>

        <fieldset>
            <ul>
            <h3>■オン / ON の写真</h3>
            <p class="photo_on"><img src="https://placehold.jp/c9c9c9/ffffff/600×600.png?text=%E3%83%80%E3%83%9F%E3%83%BC%E7%94%BB%E5%83%8F" width="200"></p>

                <li><P>アップロードする画像ファイルを選択する:</P></li>
                <li><input type="file" name="photo_on" id="photo_on" accept="image/*" size="35"></li>

            <h3>■オフ / OFF の写真</h3>
            <p class="photo_off"><img src="https://placehold.jp/c9c9c9/ffffff/600×600.png?text=%E3%83%80%E3%83%9F%E3%83%BC%E7%94%BB%E5%83%8F" width="200"></p>

                <li><P>アップロードする画像ファイルを選択する:</P></li>
                <li><input type="file" name="photo_off" id="photo_off" accept="image/*" size="35"></li>

            <h3>■昔の写真</h3>
            <p class="photo_old"><img src="https://placehold.jp/c9c9c9/ffffff/600×600.png?text=%E3%83%80%E3%83%9F%E3%83%BC%E7%94%BB%E5%83%8F" width="200"></p>

                <li><P>アップロードする画像ファイルを選択する:</P></li>
                <li><input type="file" name="photo_old" id="photo_old" accept="image/*" size="35"></li>



            <a id="submit">登録</a>

            </ul>
        </fieldset>
    </section>
    
</form>



   
    
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<!-- ↓↓ ILTyのコードよりコピペ -->

<script src="http://code.jquery.com/jquery-3.0.0.js"></script>
<script>
//---------------------------------------------------
//画像サムネイル表示
//---------------------------------------------------
// アップロードするファイルを選択
$('#photo_on').change(function() {
  //選択したファイルを取得し、file変数に格納
  var file = $(this).prop('files')[0];
  // 画像以外は処理を停止
  if (!file.type.match('image.*')) {
    // クリア
    $(this).val(''); //選択されてるファイルを空にする
    $('.photo_on > img').html(''); //画像表示箇所を空にする
    return;
  }
  // 画像表示
  var reader = new FileReader(); //1
  reader.onload = function() {   //2
    $('.photo_on > img').attr('src', reader.result);
  }
  reader.readAsDataURL(file);    //3
});

$('#photo_off').change(function() {
  //選択したファイルを取得し、file変数に格納
  var file = $(this).prop('files')[0];
  // 画像以外は処理を停止
  if (!file.type.match('image.*')) {
    // クリア
    $(this).val(''); //選択されてるファイルを空にする
    $('.photo_off > img').html(''); //画像表示箇所を空にする
    return;
  }
  // 画像表示
  var reader = new FileReader(); //1
  reader.onload = function() {   //2
    $('.photo_off > img').attr('src', reader.result);
  }
  reader.readAsDataURL(file);    //3
});

$('#photo_old').change(function() {
  //選択したファイルを取得し、file変数に格納
  var file = $(this).prop('files')[0];
  // 画像以外は処理を停止
  if (!file.type.match('image.*')) {
    // クリア
    $(this).val(''); //選択されてるファイルを空にする
    $('.photo_old > img').html(''); //画像表示箇所を空にする
    return;
  }
  // 画像表示
  var reader = new FileReader(); //1
  reader.onload = function() {   //2
    $('.photo_old > img').attr('src', reader.result);
  }
  reader.readAsDataURL(file);    //3
});




// ボタンクリックでフォームを送信

$("#submit").click(function(){

$('#photo').submit();

});



</script>



<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



</body>

</html>

