<?php
//共通に使う関数を記述
//XSS対応（ echoする場所で使用！それ以外はNG ）
//1.  DB接続します
// スペシャルキャラーズのやつ！
function h($str){
    return htmlspecialchars($str,ENT_QUOTES);
  }