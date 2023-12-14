<style>
.data-block {
  border: 1px solid #ccc; /* 外枠の色と太さ */
  padding: 10px; /* 内側の余白 */
  margin-bottom: 10px; /* ブロック間の間隔 */
}
</style>

<?php
//1.  DB接続します
// funcs.phpを呼び出す
require_once('funcs.php');

try {
  // try catchはif文に似ている
  //ID:'root', Password: xamppは 空白 ''
  $pdo = new PDO('mysql:dbname=phpkadai;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM phpkadai2");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<div class='data-block'>";
    $view .= "<p>Name: " . h($result['name']) . "</p>";
    $view .= "<p>Address: " . h($result['adress']) . "</p>";
    $view .= "<p>Latitude: " . h($result['lat']) . "</p>";
    $view .= "<p>Longitude: " . h($result['lng']) . "</p>";
    $view .= "<p>File: " . h($result['file']) . "</p>";
    $view .= "</div>";
    //  .=だと追記されていく！上書きされない！
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>登録医療機関一覧</title>
<link rel="stylesheet" href="select.css">
</head>

<body>

    <a class="navbar-brand" href="index.php">データ登録画面に戻る</a>

    <div class="last"><?= $view ?></div>

</body>
</html>