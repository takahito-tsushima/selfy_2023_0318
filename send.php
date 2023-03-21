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
$stmt = $pdo->prepare('SELECT * FROM register05_history where lid = :lid');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();

//３．データ表示

$id = '' ;


if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {  
        //GETデータ送信リンク作成
        
        $id .= "www.selfy.co.jp/accept.php?id=" . h($result['id']);
        

    }
}
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

    <title>送信する / Send</title>

</head>

<body>

<main>
  <div class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
        <span class="fs-4">Send / 送信する</span>
    </header>

    <div><p class="lead">以下のいずれかの方法で送信できます</p></div>


    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">私のカードを送信</h1><br>
        <p class="col-md-8 fs-4">私のカードを作成してメール署名として送信する</p>
        <a class="btn btn-primary btn-lg" href="create_card.php">Create My Card / 私のカードを作成する</a>

      </div>
    </div>

    <div class="row align-items-md-stretch">
      <div class="col-md-6">
        <div class="h-100 p-5 text-bg-dark rounded-3">
          <h2>ORコード読取</h2>
          <p>送信相手のスマホカメラで読み取ってもらう</p>
          <div class="text-center">
            <img src="https://chart.apis.google.com/chart?cht=qr&chs=250x250&chl='<?= $id ?>'">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="h-100 p-5 bg-light border rounded-3">
          <h2>ドメイン送信</h2>
          <p>リンクをコピーしてメールなどで送る</p>
          <div class="pb-3">
            <input type="text"  id="js_copy_url" name="copy_url" value="<?= $id ?>">
          </div class="pb-3">
          <button class="btn btn-outline-secondary" type="button" id="js_copybtn">Copy / コピー</button>
        </div>
      </div>
    </div>

    <footer class="pt-3 mt-4 text-muted border-top"></footer>
  </div>
</main>



<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>

$(function() {
  $('#js_copybtn').on('click', function(){
    //　テキストエリアを選択
    $('#js_copy_url').select();
    // コピー
    document.execCommand('copy');
    alert('コピーされました。');
  });
});

</script>



<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>




</body>

</html>