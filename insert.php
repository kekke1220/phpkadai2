<?php

/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */

//1. POSTデータ取得
$name = $_POST['name'];
$adress = $_POST['adress'];
$file = $_POST['file'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];


//2. DB接続します
try {
  // try catchはif文に似ている
  //ID:'root', Password: xamppは 空白 ''
  $pdo = new PDO('mysql:dbname=phpkadai;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成

// 1. SQL文を用意
$stmt = $pdo->prepare("
INSERT INTO 
phpkadai2(id, name, adress, file, lat, lng)
VALUES(NULL, :name, :adress, :file, :lat, :lng);
");

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR

$stmt->bindValue(':name', $name, PDO::PARAM_STR);
// 数字の場合は、STRではなくINT
$stmt->bindValue(':adress', $adress, PDO::PARAM_STR);
$stmt->bindValue(':file', $file, PDO::PARAM_STR);
$stmt->bindValue(':lat', $lat, PDO::PARAM_STR);
$stmt->bindValue(':lng', $lng, PDO::PARAM_STR);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
}else{
  //５．index.phpへリダイレクト
  // 成功した場合
  header('Location: ok.php');
}
?>