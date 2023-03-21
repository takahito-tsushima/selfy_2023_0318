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
$stmt = $pdo->prepare('SELECT * FROM register01_on where lid = :lid');
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

    <title>【 Selfy 】「私のプロフ」の登録 - オンの私 / ON</title>

</head>

<body>

<h1>「オンの私 / ON」の登録</h1>
    
<form method="POST" action="update01_on.php" id="profileON" name="profileON">


    <section id="profileOn_01">
        <h2>【1/3】オンの私 / ON</h2>

        <fieldset>
            <UL>

                <h3>■私のキャッチコピー</h3>

                    <li id="js_catch_phrase_on"><input type="text" maxlength=20 name="catch_phrase_on" value="<?= $result['catch_phrase_on'] ?>"></li>

                <h3>■基本情報</h3>

                    <li><P>姓（漢字）</P></li>
                    <li id="js_name01j_area" ><input required type="text" name="name01j" value="<?= $result['name01j'] ?>"></li>
                    <li><P>名（漢字）</P></li>
                    <li id="js_name02j_area" ><input required type="text" name="name02j" value="<?= $result['name02j'] ?>"></li>
                    <li><P>姓（ローマ字）</P></li>
                    <li id="js_name01e_area"><input required type="text" name="name01e" value="<?= $result['name01e'] ?>"></li>
                    <li><P>名（ローマ字）</P></li>
                    <li id="js_name02e_area"><input required type="text" name="name02e" value="<?= $result['name02e'] ?>"></li>
                    <li><P>生年月</P></li>
                    <li><input type="text" maxlength="4" name="birth_year" value="<?= $result['birth_year'] ?>">年</li>
                    <li><input type="text" maxlength="2" name="birth_month" value="<?= $result['birth_month'] ?>">月</li>
                    <!-- <li>
                        <select name="birth_year" id="js_birth_year"></select><label>年</label>  
                        <select name="" id="js_birth_month"></select><label>月</label>
                    </li> -->
                        <li><P>出身地</P></li>
                    <li>    
                    <div>
                        <input required type="radio" name="born_place" id="js_domestic" value="日本" <?php if ($result['born_place'] == "日本") echo 'checked'; ?>><label for="js_domestic">国内</label>
                        <select class="born-place" name="prefecture" id="js_born_domestic">
                            <option value="" <?php if ($result['prefecture'] == "") echo 'selected'; ?>>都道府県を選択</option>
                            <option value="北海道" <?php if ($result['prefecture'] == "北海道") echo 'selected'; ?>>北海道</option>
                            <option value="青森県" <?php if ($result['prefecture'] == "青森県") echo 'selected'; ?>>青森県</option>
                            <option value="岩手県" <?php if ($result['prefecture'] == "岩手県") echo 'selected'; ?>>岩手県</option>
                            <option value="宮城県" <?php if ($result['prefecture'] == "宮城県") echo 'selected'; ?>>宮城県</option>
                            <option value="秋田県" <?php if ($result['prefecture'] == "秋田県") echo 'selected'; ?>>秋田県</option>
                            <option value="山形県" <?php if ($result['prefecture'] == "山形県") echo 'selected'; ?>>山形県</option>
                            <option value="福島県" <?php if ($result['prefecture'] == "福島県") echo 'selected'; ?>>福島県</option>
                            <option value="茨城県" <?php if ($result['prefecture'] == "茨城県") echo 'selected'; ?>>茨城県</option>
                            <option value="栃木県" <?php if ($result['prefecture'] == "栃木県") echo 'selected'; ?>>栃木県</option>
                            <option value="群馬県" <?php if ($result['prefecture'] == "群馬県") echo 'selected'; ?>>群馬県</option>
                            <option value="埼玉県" <?php if ($result['prefecture'] == "埼玉県") echo 'selected'; ?>>埼玉県</option>
                            <option value="千葉県" <?php if ($result['prefecture'] == "千葉県") echo 'selected'; ?>>千葉県</option>
                            <option value="東京都" <?php if ($result['prefecture'] == "東京都") echo 'selected'; ?>>東京都</option>
                            <option value="神奈川県" <?php if ($result['prefecture'] == "神奈川県") echo 'selected'; ?>>神奈川県</option>
                            <option value="新潟県" <?php if ($result['prefecture'] == "新潟県") echo 'selected'; ?>>新潟県</option>
                            <option value="富山県" <?php if ($result['prefecture'] == "富山県") echo 'selected'; ?>>富山県</option>
                            <option value="石川県" <?php if ($result['prefecture'] == "石川県") echo 'selected'; ?>>石川県</option>
                            <option value="福井県" <?php if ($result['prefecture'] == "福井県") echo 'selected'; ?>>福井県</option>
                            <option value="山梨県" <?php if ($result['prefecture'] == "山梨県") echo 'selected'; ?>>山梨県</option>
                            <option value="長野県" <?php if ($result['prefecture'] == "長野県") echo 'selected'; ?>>長野県</option>
                            <option value="岐阜県" <?php if ($result['prefecture'] == "岐阜県") echo 'selected'; ?>>岐阜県</option>
                            <option value="静岡県" <?php if ($result['prefecture'] == "静岡県") echo 'selected'; ?>>静岡県</option>
                            <option value="愛知県" <?php if ($result['prefecture'] == "愛知県") echo 'selected'; ?>>愛知県</option>
                            <option value="三重県" <?php if ($result['prefecture'] == "三重県") echo 'selected'; ?>>三重県</option>
                            <option value="滋賀県" <?php if ($result['prefecture'] == "滋賀県") echo 'selected'; ?>>滋賀県</option>
                            <option value="京都府" <?php if ($result['prefecture'] == "京都府") echo 'selected'; ?>>京都府</option>
                            <option value="大阪府" <?php if ($result['prefecture'] == "大阪府") echo 'selected'; ?>>大阪府</option>
                            <option value="兵庫県" <?php if ($result['prefecture'] == "兵庫県") echo 'selected'; ?>>兵庫県</option>
                            <option value="奈良県" <?php if ($result['prefecture'] == "奈良県") echo 'selected'; ?>>奈良県</option>
                            <option value="和歌山県" <?php if ($result['prefecture'] == "和歌山県") echo 'selected'; ?>>和歌山県</option>
                            <option value="鳥取県" <?php if ($result['prefecture'] == "鳥取県") echo 'selected'; ?>>鳥取県</option>
                            <option value="島根県" <?php if ($result['prefecture'] == "島根県") echo 'selected'; ?>>島根県</option>
                            <option value="岡山県" <?php if ($result['prefecture'] == "岡山県") echo 'selected'; ?>>岡山県</option>
                            <option value="広島県" <?php if ($result['prefecture'] == "広島県") echo 'selected'; ?>>広島県</option>
                            <option value="山口県" <?php if ($result['prefecture'] == "山口県") echo 'selected'; ?>>山口県</option>
                            <option value="徳島県" <?php if ($result['prefecture'] == "徳島県") echo 'selected'; ?>>徳島県</option>
                            <option value="香川県" <?php if ($result['prefecture'] == "香川県") echo 'selected'; ?>>香川県</option>
                            <option value="愛媛県" <?php if ($result['prefecture'] == "愛媛県") echo 'selected'; ?>>愛媛県</option>
                            <option value="高知県" <?php if ($result['prefecture'] == "高知県") echo 'selected'; ?>>高知県</option>
                            <option value="福岡県" <?php if ($result['prefecture'] == "福岡県") echo 'selected'; ?>>福岡県</option>
                            <option value="佐賀県" <?php if ($result['prefecture'] == "佐賀県") echo 'selected'; ?>>佐賀県</option>
                            <option value="長崎県" <?php if ($result['prefecture'] == "長崎県") echo 'selected'; ?>>長崎県</option>
                            <option value="熊本県" <?php if ($result['prefecture'] == "熊本県") echo 'selected'; ?>>熊本県</option>
                            <option value="大分県" <?php if ($result['prefecture'] == "大分県") echo 'selected'; ?>>大分県</option>
                            <option value="宮崎県" <?php if ($result['prefecture'] == "宮崎県") echo 'selected'; ?>>宮崎県</option>
                            <option value="鹿児島県" <?php if ($result['prefecture'] == "鹿児島県") echo 'selected'; ?>>鹿児島県</option>
                            <option value="沖縄県" <?php if ($result['prefecture'] == "沖縄県") echo 'selected'; ?>>沖縄県</option>
                        </select>
                    </li>
                    <li>
                        <input required type="radio" name="born_place" id="js_overseas" value="海外" <?php if ($result['born_place'] == "海外") echo 'checked'; ?>><label for="js_overseas">海外</label>    
                        <input type="text" class="born-place" name="country" id="js_born_overseas">
                    </li>
                </div>

                <h3>■名刺情報</h3>
                    
                    <li><P>職業</P></li>
                    <div id="js-occupation_area">
                        <li>
                        <select name="occupation" id="js-occupation">
                            <option id="js_occupation_blanc" value="" <?php if ($result['occupation'] == "") echo 'selected'; ?>></option>    
                            <option id="js_business_person" value="会社員・公務員" <?php if ($result['occupation'] == "会社員・公務員") echo 'selected'; ?>>会社員・公務員</option>
                            <option id="js_part_timer" value="パート・アルバイト" <?php if ($result['occupation'] == "パート・アルバイト") echo 'selected'; ?>>パート・アルバイト</option>
                            <option id="js_company_executive" value="経営者・役員" <?php if ($result['occupation'] == "経営者・役員") echo 'selected'; ?>>経営者・役員</option>
                            <option id="js_freelance" value="フリーランス" <?php if ($result['occupation'] == "フリーランス") echo 'selected'; ?>>フリーランス</option>
                            <option id="js_professional" value="士業・専門職" <?php if ($result['occupation'] == "士業・専門職") echo 'selected'; ?>>士業・専門職</option>
                            <option id="js_student" value="学生" <?php if ($result['occupation'] == "学生") echo 'selected'; ?>>学生</option>
                            <option id="js_house_person" value="主婦・主夫" <?php if ($result['occupation'] == "主婦・主夫") echo 'selected'; ?>>主婦・主夫</option>
                            <option id="js_other_person" value="その他" <?php if ($result['occupation'] == "") echo 'selected'; ?>>その他</option>
                        </select>
                        </li>    
                    </div>

                    <!-- <div id="js_company_name" class="occupation-detail">
                        <li id="js_company_area"><P>勤務先</P></li>
                        <li><input id="js_company" class="" type="text" name="affiliation" value="<?= $result['affiliation'] ?>"></li>
                        <li id="js_division_area"><P>部署名・役職名</P></li>
                        <li><input id="js_division" class="" type="text" name="division" value="<?= $result['division'] ?>"></li>
                        <li><P>入社年月</P></li>
                    </div>
                    <div id="js_business_name" class="occupation-detail">
                        <li><P>職種名</P></li>
                        <li id="js_description_area"><input id="js_description" class="" type="text" name="description" value="<?= $result['description'] ?>"></li>
                        <li><P>開始年月</P></li>
                    </div>
                    <div id="js_school_name" class="occupation-detail">
                        <li><P>学校名</P></li>
                        <li id="js_school_area"><input id="js_school" class="" type="text" name="affiliation" value="<?= $result['affiliation'] ?>"></li>
                        <li><P>学部・学科・学年</P></li>
                        <li id="js_grade_area"><input id="js_grade" class="" type="text" name="division" value="<?= $result['division'] ?>"></li>
                        <li><P>入学年月</P></li>
                    </div>
                    <div id="js_others_name" class="occupation-detail">
                        <li><P>職種名</P></li>
                        <li id="js_description_area"><input id="js_description" class="" type="text" name="description" value="<?= $result['description'] ?>"></li>
                    </div> -->

                    <div id="js_company_name">
                        <li><P>勤務先</P></li>
                    </div>
                    <div id="js_business01_name">
                        <li><P>職種名①</P></li>
                    </div>
                    <div id="js_school_name">
                        <li><P>学校名</P></li>
                    </div>
                    <div id="js_affiliation">
                        <li><input type="text" name="affiliation" value="<?= $result['affiliation'] ?>"></li>
                    </div>

                    <div id="js_division_name">
                        <li><P>部署名・役職名</P></li>
                    </div>
                    <div id="js_business02_name">
                        <li><P>職種名②</P></li>
                    </div>
                    <div id="js_department_name">
                        <li><P>学部・学科・学年</P></li>
                    </div>
                    <div id="js_division">
                        <li><input type="text" name="division" value="<?= $result['division'] ?>"></li>
                    </div>
    
                    <div id="js_company_start">
                        <li><P>入社年月</P></li>
                    </div>
                    <div id="js_business_start">
                        <li><P>開始年月</P></li>
                    </div>
                    <div id="js_school_start">
                        <li><P>入学年月</P></li>
                    </div>
                    <div id="js_start" class="occupation-detail">
                        <li><input type="text" maxlength="4" name="start_year" value="<?= $result['start_year'] ?>">年</li>
                        <li><input type="text" maxlength="2" name="start_month" value="<?= $result['start_month'] ?>">月</li>
                        <!-- <li>
                        <select name="start_year" id="js_start_year"></select><label>年</label>  
                        <select name="start_month" id="js_start_month"></select><label>月</label>
                        </li> -->
                    </div>

                        <li><P>郵便番号（ハイフンなし）</P></li>
                        <li id="js_postal_area01"><input type="text" maxlength=7 name="postal" value="<?= $result['postal'] ?>"></li>
                        <li><P>住所①</P></li>
                        <li id="js_address_area01"><input type="text" name="address01" value="<?= $result['address01'] ?>"></li>
                        <li><P>住所②</P></li>
                        <li id="js_address_area01"><input type="text" name="address02" value="<?= $result['address02'] ?>"></li>
                        <li><P>電話</P></li>
                        <li id="js_phone_area01"><input type="text" name="phone" value="<?= $result['phone'] ?>"></li>
                        <li><P>FAX</P></li>
                        <li id="js_fax_area01"><input type="text" name="fax" value="<?= $result['fax'] ?>"></li>
                        <li><P>HP</P></li>
                        <li id="js_url_area01"><input type="url" name="url" value="<?= $result['url'] ?>"></li>                            
                        <li><P>Eメール</P></li>
                        <li id="js_email_area01"><input type="email" name="email" value="<?= $result['email'] ?>"></li>
                        <li><P>携帯</P></li>
                        <li id="js_mobile_area01"><input type="text" name="mobile" value="<?= $result['mobile'] ?>"></li>
          

                <a id="go_to_profileOn_02">次へ</a>
            </ul>
        </fieldset>
    </section>


    <section id="profileOn_02">
        <h2>【2/3】オンの私 / ON</h2>

        <fieldset>
            <ul>
                <h3>■私の経歴</h3>
                <li><P>大学</P></li>
                    <li id="js_univ_area01"><input type="text" maxlength=15 id="js_univ" name="univ" value="<?= $result['univ'] ?>"></li>
                <li><P>学部・学科</P></li>
                    <li id="js_univ_area01"><input type="text" maxlength=15 id="js_univ_major" name="univ_major" value="<?= $result['univ_major'] ?>"></li>
                <li><P>期間</P></li>
                <li><input type="text" maxlength="4" name="univ_start_year" value="<?= $result['univ_start_year'] ?>">年</li>
                <li><input type="text" maxlength="2" name="univ_start_month" value="<?= $result['univ_start_month'] ?>">月 入学</li>
                <li><input type="text" maxlength="4" name="univ_end_year" value="<?= $result['univ_end_year'] ?>">年</li>
                <li><input type="text" maxlength="2" name="univ_end_month" value="<?= $result['univ_end_month'] ?>">月 卒業</li>
                <!-- <li>
                    <select name="univ_start_year" id="js_univ_start_year"></select><label>年</label>  
                    <select name="univ_start_month" id="js_univ_start_month"></select><label>月 入学</label>
                    <select name="univ_end_year" id="js_univ_end_year"></select><label>年</label>  
                    <select name="univ_end_month" id="js_univ_end_month"></select><label>月 卒業</label>
                </li> -->
                <li><P>高校</P></li>
                    <li id="js_hs_area01"><input type="text" maxlength=15 id="js_hs" name="hs" value="<?= $result['hs'] ?>"></li>
                <li><P>学科</P></li>
                    <li id="js_hs_area01"><input type="text" maxlength=15 id="js_hs_major" name="hs_major" value="<?= $result['hs_major'] ?>"></li>
                <li><P>期間</P></li>
                <li><input type="text" maxlength="4" name="hs_start_year" value="<?= $result['hs_start_year'] ?>">年</li>
                <li><input type="text" maxlength="2" name="hs_start_month" value="<?= $result['hs_start_month'] ?>">月 入学</li>
                <li><input type="text" maxlength="4" name="hs_end_year" value="<?= $result['hs_end_year'] ?>">年</li>
                <li><input type="text" maxlength="2" name="hs_end_month" value="<?= $result['hs_end_month'] ?>">月 卒業</li>
                <!-- <li>
                    <select name="hs_start_year" id="js_hs_start_year"></select><label>年</label>  
                    <select name="hs_start_month" id="js_hs_start_month"></select><label>月 入学</label>
                    <select name="hs_end_year" id="js_hs_end_year"></select><label>年</label>  
                    <select name="hs_end_month" id="js_hs_end_month"></select><label>月 卒業</label>
                </li> -->
                <li><P>大学院</P></li>
                    <li id="js_grad_area01"><input type="text" maxlength=15 id="js_grad" name="grad" value="<?= $result['grad'] ?>"></li>
                <li><P>研究科・専攻</P></li>
                    <li id="js_grad_area01"><input type="text" maxlength=15 id="js_grad_major" name="grad_major" value="<?= $result['grad_major'] ?>"></li>
                <li><P>期間</P></li>
                <li><input type="text" maxlength="4" name="grad_start_year" value="<?= $result['grad_start_year'] ?>">年</li>
                <li><input type="text" maxlength="2" name="grad_start_month" value="<?= $result['grad_start_month'] ?>">月 入学</li>
                <li><input type="text" maxlength="4" name="grad_end_year" value="<?= $result['grad_end_year'] ?>">年</li>
                <li><input type="text" maxlength="2" name="grad_end_month" value="<?= $result['grad_end_month'] ?>">月 卒業</li>
                <!-- <li>
                    <select name="grad_start_year" id="js_grad_start_year"></select><label>年</label>  
                    <select name="grad_start_month" id="js_grad_start_month"></select><label>月 入学</label>
                    <select name="grad_end_year" id="js_grad_end_year"></select><label>年</label>  
                    <select name="grad_end_month" id="js_grad_end_month"></select><label>月 卒業</label>
                </li> -->
                <li><P>職歴（1）</P></li>
                <li><P>会社名</P></li>
                    <li id="js_career_area01"><input type="text" maxlength=15 id="js_career01" name="career01" value="<?= $result['career01'] ?>"></li>
                <li><P>部署名</P></li>
                    <li id="js_career_area01"><input type="text" maxlength=15 id="js_career01_division" name="division01" value="<?= $result['division01'] ?>"></li>
                <li><P>期間</P></li>
                <li><input type="text" maxlength="4" name="career01_start_year" value="<?= $result['career01_start_year'] ?>">年</li>
                <li><input type="text" maxlength="2" name="career01_start_month" value="<?= $result['career01_start_month'] ?>">月 ～</li>
                <li><input type="text" maxlength="4" name="career01_end_year" value="<?= $result['career01_end_year'] ?>">年</li>
                <li><input type="text" maxlength="2" name="career01_end_month" value="<?= $result['career01_end_month'] ?>">月</li>
                <!-- <li>
                    <select name="career01_start_year" id="js_career01_start_year"></select><label>年</label>  
                    <select name="career01_start_month" id="js_career01_start_month"></select><label>月 ～</label>
                    <select name="career01_end_year" id="js_career01_end_year"></select><label>年</label>  
                    <select name="career01_end_month" id="js_career01_end_month"></select><label>月</label>
                </li> -->
                <li><P>経験内容</P></li>
                <li id="js_career_detail_area01"><input type="text" id="js_career01_detail" name="career01_detail" value="<?= $result['career01_detail'] ?>"></li>
                <li><P>職歴（2）</P></li>
                <li><P>会社名</P></li>
                    <li id="js_career_area02"><input type="text" maxlength=15 id="js_career02" name="career02" value="<?= $result['career02'] ?>"></li>
                <li><P>部署名</P></li>
                    <li id="js_career_area02"><input type="text" maxlength=15 id="js_career02_division" name="division02" value="<?= $result['division02'] ?>"></li>
                <li><P>期間</P></li>
                <li><input type="text" maxlength="4" name="career02_start_year" value="<?= $result['career02_start_year'] ?>">年</li>
                <li><input type="text" maxlength="2" name="career02_start_month" value="<?= $result['career02_start_month'] ?>">月 ～</li>
                <li><input type="text" maxlength="4" name="career02_end_year" value="<?= $result['career02_end_year'] ?>">年</li>
                <li><input type="text" maxlength="2" name="career02_end_month" value="<?= $result['career02_end_month'] ?>">月</li>
                <!-- <li>
                    <select name="career02_start_year" id="js_career02_start_year"></select><label>年</label>  
                    <select name="career02_start_month" id="js_career02_start_month"></select><label>月 ～</label>
                    <select name="career02_end_year" id="js_career02_end_year"></select><label>年</label>  
                    <select name="career02_end_month" id="js_career02_end_month"></select><label>月</label>
                </li> -->
                <li><P>経験内容</P></li>
                <li id="js_career_detail_area02"><input type="text" id="js_career02_detail" name="career02_detail" value="<?= $result['career02_detail'] ?>"></li>
                <li><P>職歴（3）</P></li>
                <li><P>会社名</P></li>
                    <li id="js_career_area03"><input type="text" maxlength=15 id="js_career03" name="career03" value="<?= $result['career03'] ?>"></li>
                <li><P>部署名</P></li>
                    <li id="js_career_area03"><input type="text" maxlength=15 id="js_career03_division" name="division03" value="<?= $result['division03'] ?>"></li>
                <li><P>期間</P></li>
                <li><input type="text" maxlength="4" name="career03_start_year" value="<?= $result['career03_start_year'] ?>">年</li>
                <li><input type="text" maxlength="2" name="career03_start_month" value="<?= $result['career03_start_month'] ?>">月 ～</li>
                <li><input type="text" maxlength="4" name="career03_end_year" value="<?= $result['career03_end_year'] ?>">年</li>
                <li><input type="text" maxlength="2" name="career03_end_month" value="<?= $result['career03_end_month'] ?>">月</li>
                <!-- <li>
                    <select name="career03_start_year" id="js_career03_start_year"></select><label>年</label>  
                    <select name="career03_start_month" id="js_career03_start_month"></select><label>月 ～</label>
                    <select name="career03_end_year" id="js_career03_end_year"></select><label>年</label>  
                    <select name="career03_end_month" id="js_career03_end_month"></select><label>月</label>
                </li> -->
                <li><P>経験内容</P></li>
                <li id="js_career_detail_area03"><input type="text" id="js_career03_detail" name="career03_detail" value="<?= $result['career03_detail'] ?>"></li>

                <a id="back_to_profileOn_01">戻る</a>
                <a id="go_to_profileOn_03">次へ</a>
            </ul>
        </fieldset>
    </section>


    <section id="profileOn_03">
        <h2>【3/3】オンの私 / ON</h2>

        <fieldset>
            <ul>
                <h3>■私のモチベ</h3>
                <P>（最大３つ）</P>
                <div class="motivation">
                <ul>
                    <li><P>【 貢  献 】</P></li>
                    <li><input type="checkbox" name="motiv[]" class="motiv" id="motivation01" value="【 貢  献 】誰かの笑顔を見ること" onclick="click_cb();" <?php if ($result['motiv01'] == "【 貢  献 】誰かの笑顔を見ること" || $result['motiv02'] == "【 貢  献 】誰かの笑顔を見ること" || $result['motiv03'] == "【 貢  献 】誰かの笑顔を見ること") echo 'checked'; ?>><label for="motivation01">誰かの笑顔を見ること</label></li>
                    <li><input type="checkbox" name="motiv[]" class="motiv" id="motivation02" value="【 貢  献 】誰かの役に立てること" onclick="click_cb();" <?php if ($result['motiv01'] == "【 貢  献 】誰かの役に立てること" || $result['motiv02'] == "【 貢  献 】誰かの役に立てること" || $result['motiv03'] == "【 貢  献 】誰かの役に立てること") echo 'checked'; ?>><label for="motivation02">誰かの役に立てること</label></li>
                    <li><input type="checkbox" name="motiv[]" class="motiv" id="motivation03" value="【 貢  献 】誰かを影で支えること" onclick="click_cb();" <?php if ($result['motiv01'] == "【 貢  献 】誰かを影で支えること" || $result['motiv02'] == "【 貢  献 】誰かを影で支えること" || $result['motiv03'] == "【 貢  献 】誰かを影で支えること") echo 'checked'; ?>><label for="motivation03">誰かを影で支えること</label></li>
                    <li><P>【 スキル 】</P></li>
                    <li><input type="checkbox" name="motiv[]" class="motiv" id="motivation04" value="【 スキル 】知識やスキルが身に着くこと" onclick="click_cb();" <?php if ($result['motiv01'] == "【 スキル 】知識やスキルが身に着くこと" || $result['motiv02'] == "【 スキル 】知識やスキルが身に着くこと" || $result['motiv03'] == "【 スキル 】知識やスキルが身に着くこと") echo 'checked'; ?>><label for="motivation04">知識やスキルが身に着くこと</label></li>
                    <li><input type="checkbox" name="motiv[]" class="motiv" id="motivation05" value="【 スキル 】答えや解決策を見つけ出すこと" onclick="click_cb();" <?php if ($result['motiv01'] == "【 スキル 】答えや解決策を見つけ出すこと" || $result['motiv02'] == "【 スキル 】答えや解決策を見つけ出すこと" || $result['motiv03'] == "【 スキル 】答えや解決策を見つけ出すこと") echo 'checked'; ?>><label for="motivation05">答えや解決策を見つけ出すこと</label></li>
                    <li><input type="checkbox" name="motiv[]" class="motiv" id="motivation06" value="【 スキル 】何かを表現・創造すること" onclick="click_cb();" <?php if ($result['motiv01'] == "【 スキル 】何かを表現・創造すること" || $result['motiv02'] == "【 スキル 】何かを表現・創造すること" || $result['motiv03'] == "【 スキル 】何かを表現・創造すること") echo 'checked'; ?>><label for="motivation06">何かを表現・創造すること</label></li>
                    <li><P>【 協  力 】</P></li>
                    <li><input type="checkbox" name="motiv[]" class="motiv" id="motivation07" value="【 協  力 】リーダーシップを発揮すること" onclick="click_cb();" <?php if ($result['motiv01'] == "【 協  力 】リーダーシップを発揮すること" || $result['motiv02'] == "【 協  力 】リーダーシップを発揮すること" || $result['motiv03'] == "【 協  力 】リーダーシップを発揮すること") echo 'checked'; ?>><label for="motivation07">リーダーシップを発揮すること</label></li>
                    <li><input type="checkbox" name="motiv[]" class="motiv" id="motivation08" value="【 協  力 】みんなで協力して取り組むこと" onclick="click_cb();" <?php if ($result['motiv01'] == "【 協  力 】みんなで協力して取り組むこと" || $result['motiv02'] == "【 協  力 】みんなで協力して取り組むこと" || $result['motiv03'] == "【 協  力 】みんなで協力して取り組むこと") echo 'checked'; ?>><label for="motivation08">みんなで協力して取り組むこと</label></li>
                    <li><input type="checkbox" name="motiv[]" class="motiv" id="motivation09" value="【 協  力 】チームをサポートすること" onclick="click_cb();" <?php if ($result['motiv01'] == "【 協  力 】チームをサポートすること" || $result['motiv02'] == "【 協  力 】チームをサポートすること" || $result['motiv03'] == "【 協  力 】チームをサポートすること") echo 'checked'; ?>><label for="motivation09">チームをサポートすること</label></li>
                    <li><P>【 成  長 】</P></li>
                    <li><input type="checkbox" name="motiv[]" class="motiv" id="motivation10" value="【 成  長 】結果に向けて努力をすること" onclick="click_cb();" <?php if ($result['motiv01'] == "【 成  長 】結果に向けて努力をすること" || $result['motiv02'] == "【 成  長 】結果に向けて努力をすること" || $result['motiv03'] == "【 成  長 】結果に向けて努力をすること") echo 'checked'; ?>><label for="motivation10">結果に向けて努力をすること</label></li>
                    <li><input type="checkbox" name="motiv[]" class="motiv" id="motivation11" value="【 成  長 】新たなチャレンジをすること" onclick="click_cb();" <?php if ($result['motiv01'] == "【 成  長 】新たなチャレンジをすること" || $result['motiv02'] == "【 成  長 】新たなチャレンジをすること" || $result['motiv03'] == "【 成  長 】新たなチャレンジをすること") echo 'checked'; ?>><label for="motivation11">新たなチャレンジをすること</label></li>
                    <li><input type="checkbox" name="motiv[]" class="motiv" id="motivation12" value="【 成  長 】最後までやり抜くこと" onclick="click_cb();" <?php if ($result['motiv01'] == "【 成  長 】最後までやり抜くこと" || $result['motiv02'] == "【 成  長 】最後までやり抜くこと" || $result['motiv03'] == "【 成  長 】最後までやり抜くこと") echo 'checked'; ?>><label for="motivation12">最後までやり抜くこと</label></li>
                    <li><P>【 競  争 】</P></li>
                    <li><input type="checkbox" name="motiv[]" class="motiv" id="motivation13" value="【 競  争 】売上や顧客を増やすこと" onclick="click_cb();" <?php if ($result['motiv01'] == "【 競  争 】売上や顧客を増やすこと" || $result['motiv02'] == "【 競  争 】売上や顧客を増やすこと" || $result['motiv03'] == "【 競  争 】売上や顧客を増やすこと") echo 'checked'; ?>><label for="motivation13">売上や顧客を増やすこと</label></li>
                    <li><input type="checkbox" name="motiv[]" class="motiv" id="motivation14" value="【 競  争 】ライバルに打ち勝つこと" onclick="click_cb();" <?php if ($result['motiv01'] == "【 競  争 】ライバルに打ち勝つこと" || $result['motiv02'] == "【 競  争 】ライバルに打ち勝つこと" || $result['motiv03'] == "【 競  争 】ライバルに打ち勝つこと") echo 'checked'; ?>><label for="motivation14">ライバルに打ち勝つこと</label></li>
                    <li><input type="checkbox" name="motiv[]" class="motiv" id="motivation15" value="【 競  争 】駆け引きや交渉すること" onclick="click_cb();" <?php if ($result['motiv01'] == "【 競  争 】駆け引きや交渉すること" || $result['motiv02'] == "【 競  争 】駆け引きや交渉すること" || $result['motiv03'] == "【 競  争 】駆け引きや交渉すること") echo 'checked'; ?>><label for="motivation15">駆け引きや交渉すること</label></li>
                    <li><P>【 獲  得 】</P></li>
                    <li><input type="checkbox" name="motiv[]" class="motiv" id="motivation16" value="【 獲  得 】何かを手に入れること" onclick="click_cb();" <?php if ($result['motiv01'] == "【 獲  得 】何かを手に入れること" || $result['motiv02'] == "【 獲  得 】何かを手に入れること" || $result['motiv03'] == "【 獲  得 】何かを手に入れること") echo 'checked'; ?>><label for="motivation16">何かを手に入れること</label></li>
                    <li><input type="checkbox" name="motiv[]" class="motiv" id="motivation17" value="【 獲  得 】地位や年収が上がること" onclick="click_cb();" <?php if ($result['motiv01'] == "【 獲  得 】地位や年収が上がること" || $result['motiv02'] == "【 獲  得 】地位や年収が上がること" || $result['motiv03'] == "【 獲  得 】地位や年収が上がること") echo 'checked'; ?>><label for="motivation17">地位や年収が上がること</label></li>
                    <li><input type="checkbox" name="motiv[]" class="motiv" id="motivation18" value="【 獲  得 】新たな人間関係を築くこと" onclick="click_cb();" <?php if ($result['motiv01'] == "【 獲  得 】新たな人間関係を築くこと" || $result['motiv02'] == "【 獲  得 】新たな人間関係を築くこと" || $result['motiv03'] == "【 獲  得 】新たな人間関係を築くこと") echo 'checked'; ?>><label for="motivation18">新たな人間関係を築くこと</label></li>
                </ul>
                </div>

                <h3>■私のエピソード</h3>    
                <li>
                    <select name="episode" id="js-episode">
                    <option value="" <?php if ($result['episode'] == "") echo 'selected'; ?>>内容を選択</option>
                    <option value="過去にこんな大失敗をしました！" <?php if ($result['episode'] == "過去にこんな大失敗をしました！") echo 'selected'; ?>>過去にこんな大失敗をしました！</option>    
                    <option value="過去にこんな大成功をしました！" <?php if ($result['episode'] == "過去にこんな大成功をしました！") echo 'selected'; ?>>過去にこんな大成功をしました！</option>
                    <option value="実はこんな経験があります！" <?php if ($result['episode'] == "実はこんな経験があります！") echo 'selected'; ?>>実はこんな経験があります！</option>
                    <option value="実はこんな夢を持っています！" <?php if ($result['episode'] == "実はこんな夢を持っています！") echo 'selected'; ?>>実はこんな夢を持っています！</option>
                    <option value="実はこんなことに興味があります！" <?php if ($result['episode'] == "実はこんなことに興味があります！") echo 'selected'; ?>>実はこんなことに興味があります！</option>
                    <option value="実はこんな特技があります！" <?php if ($result['episode'] == "実はこんな特技があります！") echo 'selected'; ?>>実はこんな特技があります！</option>
                </select>
                <li id="js_episode_area"><input type="textarea" maxlength=100 id="js_episode" name="episode_detail" value="<?= $result['episode_detail'] ?>"></li>


                    <a id="back_to_profileOn_02">戻る</a>
                    <a id="submit">登録</a>   


            </ul>
        </fieldset>
            
    </section>
    
</form>

   
    
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<script>

// 画面遷移

$('#profileOn_01').show();
$('#profileOn_02').hide();
$('#profileOn_03').hide();

$("#go_to_profileOn_02").on('click',function(){
    $('#profileOn_01').toggle();  //hide
    $('#profileOn_02').toggle();  //show
    $("html,body").scrollTop(0); // 画面の一番上にスクロール
    // $('#forMyTeam').hide();
});

$("#back_to_profileOn_01").on('click',function() {
    $('#profileOn_01').toggle();  //show
    $('#profileOn_02').toggle();  // hide
    // $('#forMyTeam').hide();
    $("html,body").scrollTop(0); // 画面の一番上にスクロール
});

$("#go_to_profileOn_03").on('click',function() {
    // $('#forMyColleague').hide();
    $('#profileOn_02').toggle();  //hide
    $('#profileOn_03').toggle();  //show
    $("html,body").scrollTop(0); // 画面の一番上にスクロール
});

$("#back_to_profileOn_02").on('click',function(){
    // $('#forMyColleague').hide();
    $('#profileOn_02').toggle();  //show
    $('#profileOn_03').toggle();  //hide
    $("html,body").scrollTop(0); // 画面の一番上にスクロール
});



// 年月のプルダウン作成
// function SelectBoxCreate(start, end){
//     let str = "";
//     for(let i=start; i<end; i++){
//         str += `<option>${i}</option>`;
//     }
//     return str;
// }

// const month = SelectBoxCreate(1,13);
// const year = SelectBoxCreate(1923,2024);

// $("#js_birth_year").html(year);    
// $("#js_birth_month").html(month);    

// $("#js_start_year").html(year);    
// $("#js_start_month").html(month);    

// $("#js_univ_start_year").html(year);    
// $("#js_univ_start_month").html(month);    
// $("#js_hs_start_year").html(year);    
// $("#js_hs_start_month").html(month);    
// $("#js_grad_start_year").html(year);    
// $("#js_grad_start_month").html(month);    
// $("#js_career01_start_year").html(year);    
// $("#js_career01_start_month").html(month);    
// $("#js_career02_start_year").html(year);    
// $("#js_career02_start_month").html(month);    
// $("#js_career03_start_year").html(year);    
// $("#js_career03_start_month").html(month);    

// $("#js_univ_end_year").html(year);    
// $("#js_univ_end_month").html(month);    
// $("#js_hs_end_year").html(year);    
// $("#js_hs_end_month").html(month);    
// $("#js_grad_end_year").html(year);    
// $("#js_grad_end_month").html(month);    
// $("#js_career01_end_year").html(year);    
// $("#js_career01_end_month").html(month);    
// $("#js_career02_end_year").html(year);    
// $("#js_career02_end_month").html(month);    
// $("#js_career03_end_year").html(year);    
// $("#js_career03_end_month").html(month);    



//  【 出身地 】  国内→リスト選択  海外→テキスト入力

// $(document).ready(function() {

//     $('#js_born_overseas').hide();
//     $('#js_born_domestic').hide();
    
// $(function() {
//     $('[name="born_place"]:radio').change( function() {
//       if($('[id=js_domestic]').prop('checked')){
//         $('#js_born_overseas').hide();
//         $('#js_born_domestic').toggle(); //show
//         } else if ($('[id=js_overseas]').prop('checked')) {
//             $('#js_born_overseas').toggle(); //show
//             $('#js_born_domestic').hide();
//         } 
//    });
// });



//   【 職業 】  詳細入力  選択項目で表示・非表示

        // $('#js_company_name').hide();
        // $('#js_business_name').hide();
        // $('#js_school_name').hide();
        // $('#js_others_name').hide();
        // $('#js_start').hide();


// $(function() {
//     $('#js-occupation').change( function() {

//         if($('[id=js_business_person]').prop('selected')||$('[id=js_part_timer]').prop('selected')||$('[id=js_company_executive]').prop('selected')){
//         $('#js_company_name').show(); 
//         $('#js_business_name').hide();
//         $('#js_school_name').hide();
//         $('#js_start').show();

//     } else if ($('[id=js_freelance]').prop('selected')||$('[id=js_professional]').prop('selected')) {
//         $('#js_company_name').hide();
//         $('#js_business_name').show();
//         $('#js_school_name').hide();
//         $('#js_start').show();

//     } else if ($('[id=js_student]').prop('selected')) {
//         $('#js_company_name').hide();
//         $('#js_business_name').hide();
//         $('#js_school_name').show();
//         $('#js_start').show();

//     } else if ($('[id=js_house_person]').prop('selected')||$('[id=js_other_person]').prop('selected')||$('[id=js_occupation_blanc]').prop('selected')) {
//         $('#js_company_name').hide();
//         $('#js_business_name').hide();
//         $('#js_school_name').hide();
//         $('#js_start').hide();

//     } else{
//         $('#js_company_name').hide();
//         $('#js_business_name').hide();
//         $('#js_school_name').hide();
//         $('#js_start').hide();
    
//     };
//     });
// });


//   【 職業 】  詳細入力  選択項目で表示・非表示

        $('#js_company_name').hide(); 
        $('#js_business01_name').hide();
        $('#js_school_name').hide();
        $('#js_affiliation').hide();
        $('#js_division_name').hide(); 
        $('#js_business02_name').hide();
        $('#js_department_name').hide();
        $('#js_division').hide();
        $('#js_company_start').hide(); 
        $('#js_business_start').hide();
        $('#js_school_start').hide();
        $('#js_start').hide();

        
$(function() {
    $('#js-occupation').change( function() {

        if($('[id=js_business_person]').prop('selected')||$('[id=js_part_timer]').prop('selected')||$('[id=js_company_executive]').prop('selected')){
        $('#js_company_name').show(); 
        $('#js_business01_name').hide();
        $('#js_school_name').hide();
        $('#js_affiliation').show();
        $('#js_division_name').show(); 
        $('#js_business02_name').hide();
        $('#js_department_name').hide();
        $('#js_division').show();
        $('#js_company_start').show(); 
        $('#js_business_start').hide();
        $('#js_school_start').hide();
        $('#js_start').show();

    } else if ($('[id=js_freelance]').prop('selected')||$('[id=js_professional]').prop('selected')) {
        $('#js_company_name').hide(); 
        $('#js_business01_name').show();
        $('#js_school_name').hide();
        $('#js_affiliation').show();
        $('#js_division_name').hide(); 
        $('#js_business02_name').show();
        $('#js_department_name').hide();
        $('#js_division').show();
        $('#js_company_start').hide()   ; 
        $('#js_business_start').show();
        $('#js_school_start').hide();
        $('#js_start').show();

    } else if ($('[id=js_student]').prop('selected')) {
        $('#js_company_name').hide(); 
        $('#js_business01_name').hide();
        $('#js_school_name').show();
        $('#js_affiliation').show();
        $('#js_division_name').hide(); 
        $('#js_business02_name').hide();
        $('#js_department_name').show();
        $('#js_division').show();
        $('#js_company_start').hide(); 
        $('#js_business_start').hide();
        $('#js_school_start').show();
        $('#js_start').show();

    } else if ($('[id=js_house_person]').prop('selected')||$('[id=js_other_person]').prop('selected')||$('[id=js_occupation_blanc]').prop('selected')) {
        $('#js_company_name').hide(); 
        $('#js_business01_name').hide();
        $('#js_school_name').hide();
        $('#js_affiliation').hide();
        $('#js_division_name').hide(); 
        $('#js_business02_name').hide();
        $('#js_department_name').hide();
        $('#js_division').hide();
        $('#js_company_start').hide(); 
        $('#js_business_start').hide();
        $('#js_school_start').hide();
        $('#js_start').hide();

    } else{
        $('#js_company_name').hide(); 
        $('#js_business01_name').hide();
        $('#js_school_name').hide();
        $('#js_affiliation').hide();
        $('#js_division_name').hide(); 
        $('#js_business02_name').hide();
        $('#js_department_name').hide();
        $('#js_division').hide();
        $('#js_company_start').hide(); 
        $('#js_business_start').hide();
        $('#js_school_start').hide(); 
        $('#js_start').hide();

    };
    });
});



// セレクトボックスの上限設定

function click_cb(){
    //チェックカウント用変数
    var check_count = 0;
    // 箇所チェック数カウント
    $(".motivation ul li").each(function(){
        var parent_checkbox = $(this).children("input[type='checkbox']");
        if(parent_checkbox.prop('checked')){
            check_count = check_count+1;
        }
    });
    // 0個のとき（チェックがすべて外れたとき）
    if(check_count == 0){
        $(".motivation ul li").each(function(){
            $(this).find(".locked").removeClass("locked");
        });
    // 3個以上の時（チェック可能上限数）
    }else if(check_count > 2){
        $(".motivation ul li").each(function(){
            // チェックされていないチェックボックスをロックする
            if(!$(this).children("input[type='checkbox']").prop('checked')){
                $(this).children("input[type='checkbox']").prop('disabled',true);
                $(this).addClass("locked");
            }
        });
    }else{
        $(".motivation ul li").each(function(){
            // チェックされていないチェックボックスを選択可能にする
            if(!$(this).children("input[type='checkbox']").prop('checked')){
                $(this).children("input[type='checkbox']").prop('disabled',false);
                $(this).removeClass("locked");
            }
        });
    }
    return false;
}



// ボタンクリックでフォームを送信

$("#submit").click(function(){

// // ※確認用※チェックボックスの値を配列に格納

// // 配列を宣言
//   var arr_motiv = [];
  
//   $('[class="motiv"]:checked').each(function(){
//       // 無効化する
//       $(this).prop('disabled', true);
   
//       // チェックされているの値を配列に格納
//       arr_motiv.push($(this).val());
//   });
//   console.log(arr_motiv);


$('#profileON').submit();

});

</script>



<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



</body>

</html>