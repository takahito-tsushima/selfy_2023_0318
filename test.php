<?php

// SESSION開始！！
session_start();
// 関数群の読み込み
require_once('funcs.php');
// ログインチェック処理！
loginCheck();


$lid = $_SESSION['lid'];
$id = $_GET['id'];

// 関数ファイルでreturnで外に出した$pdoを使う
$pdo = db_conn();


//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM register01_on JOIN register00_photo USING(id) where id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


//３．データ表示
$photo_on = '' or 
$catch_phrase_on = '' or
$name_j = '' or 
$name_e = '' or
$object = '' ; 

if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {  
        //GETデータ送信リンク作成
        
        $photo_on .= '<img src="./img/' . $result['photo_on'] . '" width="200">';
        $catch_phrase_on .= $result['catch_phrase_on'];
        $name_j .= $result['name01j'] . '  ' . $result['name02j'];
        $name_e .= $result['name01e'] . '  ' . $result['name02e'];
        $object .= $result['lid'];        


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

    <title>TEST</title>

</head>

<body>

<div class="container-fluid">

<form method="POST" action="record_exchange01.php?id=<?= $id ?>" id="record01" name="record01">

        <!-- <h2>プロフィールの受信</h2>

        <fieldset>
            <ul>
                <h3>受信したプロフィール</h3>
                <div><?= $photo_on ?></div>
                <div><h3><?= $catch_phrase_on ?></h3></div>
                <div><?= $name_j ?></div>
                <div><?= $name_e ?></div>

                <div><p>さんのプロフィールを見ますか？</p></div>

                <input type="hidden" name="object" value="<?= $object ?>">
                <a id="submit"  class="btn btn-secondary">見てみる</a>
            
            </ul>
        </fieldset> -->

        <main class="container">
        <div class="bg-light p-5 rounded">
            <h1>Test<h1>
            <br>
            <br>
            <div><?= $photo_on ?></div>
            <div><h5><?= $catch_phrase_on ?></h5></div>
            <br>
            <div><h3><?= $name_j ?></h3></div>
            <div><h5><?= $name_e ?></h5 ></div>   
            <br>
            <p class="lead">さんのプロフィールを見ますか？</p>
            <input type="hidden" name="object" value="<?= $object ?>">
            <a id="submit" class="btn btn-lg btn-primary">View profile / 表示する &raquo;</a>
        </div>
        </main>

</form>

</div>

<main>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body"> 
              <h3 class="card-text fw-bold">ON</h3>
              <p class="card-text fw-normal">オンの私</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>

</main>





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
          <img src="https://chart.apis.google.com/chart?cht=qr&chs=250x250&chl='<?= $id ?>'">
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







<div class="container">
<main class="container">

<!-- Three columns of text below the carousel -->
<div class="row">

  <div class="col-lg-4  p-4">
    <p class="text-center">2023-03-03</p>
    <img class="rounded-circle rounded mx-auto d-block" width="200" height="200" src="./img/James.png">
    <p class="lead text-center pt-3">いつも営業成績トップです！</p>
    <h3 class="fw-bold text-center">対馬 誉仁</h3>
    <p class="fw-normal text-center">Takahito Tsushima</p>
    <p><a class="btn btn-lg btn-secondary rounded mx-auto d-block" href="#">View details &raquo;</a></p>
  </div><!-- /.col-lg-4 -->

  <div class="col-lg-4">
    <svg class="bd-placeholder-img rounded-circle rounded mx-auto d-block" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
    <h2 class="fw-normal">Heading</h2>
    <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
    <p><a class="btn btn-lg btn-secondary rounded mx-auto d-block" href="#">View details &raquo;</a></p>
  </div><!-- /.col-lg-4 -->
  <div class="col-lg-4">
    <svg class="bd-placeholder-img rounded-circle rounded mx-auto d-block" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
    <h2 class="fw-normal">Heading</h2>
    <p>And lastly this, the third column of representative placeholder content.</p>
    <p><a class="btn btn-lg btn-secondary rounded mx-auto d-block" href="#">View details &raquo;</a></p>
  </div><!-- /.col-lg-4 -->
  <div class="col-lg-4">
    <svg class="bd-placeholder-img rounded-circle rounded mx-auto d-block" width="140" height="140" xmlns="./img/James.png" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
    <h2 class="fw-normal text-center">Heading</h2>
    <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
    <p><a class="btn btn-lg btn-secondary rounded mx-auto d-block" href="#">View details &raquo;</a></p>
  </div><!-- /.col-lg-4 -->
  <div class="col-lg-4">
    <svg class="bd-placeholder-img rounded-circle rounded mx-auto d-block" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
    <h2 class="fw-normal">Heading</h2>
    <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
    <p><a class="btn btn-lg btn-secondary rounded mx-auto d-block" href="#">View details &raquo;</a></p>
  </div><!-- /.col-lg-4 -->
  <div class="col-lg-4">
    <svg class="bd-placeholder-img rounded-circle rounded mx-auto d-block" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
    <h2 class="fw-normal">Heading</h2>
    <p>And lastly this, the third column of representative placeholder content.</p>
    <p><a class="btn btn-lg btn-secondary rounded mx-auto d-block" href="#">View details &raquo;</a></p>
  </div><!-- /.col-lg-4 -->
</div><!-- /.row -->
</main>

</div>

    
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<script>

// ボタンクリックでフォームを送信

$("#submit").click(function(){

$('#record01').submit();

});


</script>



<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



</body>

</html>