<!DOCTYPE html>
<html lang="en">
<head>
    <title>Infobox:showPointer&actions</title>
    <meta charset="utf-8">
    <style>body{padding:0;margin:0;background:#333;}h1{padding:0;margin:0;font-size:50%;color:white;}</style>
    <link rel="stylesheet" href="map.css">
</head>
<body>



<br>
<label class="open" for="pop-up">▶︎こちらをクリックしてください</label>
<input type="checkbox" id="pop-up">
<div class="overlay">
	<div class="window">
		<label class="close" for="pop-up">閉じる</label>
		<h4>地図上に貴院が表示されたことをご確認下さい。</h4>
		<p><img src="https://free-icons.net/wp-content/uploads/2020/09/symbol018.png" alt="注意" width="30px" height="30px"><br></p>
        <p>表示されない場合は、<br></p>
        <p>050-@@@@-%%%%までご連絡下さい。<br></p>
        <p>表示されている場合は、こちらで設定完了です。<br></p>
        <p>リアルタイムで求職者用のマップ上で反映されています。</p>
	</div>
</div>






<div id="myMap" style='position:relative;width:100%;height:700px;'></div>


<!-- [ infobox Object ] https://msdn.microsoft.com/en-us/library/mt712658.aspx -->
<script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=Auc_Ml-CgsQk1OE4myIJY8kF4yxCzRp00kYz7B-JthPGh8tqQHfmBiwRmKFnWIfG' async defer></script>
<script>





<?php
// データベースから情報を取得
// funcs.phpを呼び出す
require_once('funcs.php');

try {
    $pdo = new PDO('mysql:dbname=phpkadai;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
}

// データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM phpkadai2");
$status = $stmt->execute();

// データをJavaScriptで使用できる形式に変換
$locations = [];
if ($status==false) {
    // エラーハンドリング
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
} else {
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $locations[] = $result;
    }
}

// PHPの配列をJSON形式に変換
echo "let locations = ".json_encode($locations).";";
?>








function GetMap() {
    // マップの初期化
    let map = new Microsoft.Maps.Map('#myMap', {
        zoom: 14
    });

    // 現在地を取得
    navigator.geolocation.getCurrentPosition(function(position) {

    // 現在地の緯度と経度を取得
        let currentLat = position.coords.latitude;
        let currentLon = position.coords.longitude;

    // 現在地の位置情報を作成
        let currentLocation = new Microsoft.Maps.Location(currentLat, currentLon);

    // 地図のセンターを現在地に変更
        map.setView({ center: currentLocation });


    // 現在地のPushpinを作成
        let userPin = new Microsoft.Maps.Pushpin(currentLocation, {
            title: '現在地',
            color: 'red'// ピンの色
        });

        // Pushpinを地図に追加
        map.entities.push(userPin);












    });

    //Infobox
    let infobox = new Microsoft.Maps.Infobox(new Microsoft.Maps.Location(43.076398, 141.357267), {
        title: '天使病院',
        description: '日給1.2万円!残業なし!',
        showPointer: true,     //Pointer
        showCloseButton: true, //CloseButton
        //Event:Create
        actions: [{
            label: 'HP',
            eventHandler: function () { //function
                location.href="https://www.tenshi.or.jp/";
            }
        }, {
            label: '求人票',
            eventHandler: function () { //function
                location.href="https://career.whitecross.co.jp/dstyle/wp-content/uploads/2018/11/od01_01.jpg";
            }
        }, {
            label: '応募',
            eventHandler: function () { //function
                location.href="http://127.0.0.1:5500/o-boform.html";
            }
        }]
    });

    //Assign the infobox to a map instance.
    infobox.setMap(map); //Add infobox to Map








// データベースから取得した場所にピンを追加
locations.forEach(function(location) {
    let loc = new Microsoft.Maps.Location(parseFloat(location.lat), parseFloat(location.lng));
    let pin = new Microsoft.Maps.Pushpin(loc, {
        title: location.name,
        subTitle: location.adress, 
    });
    map.entities.push(pin);
});







}

</script>
</body>
</html>