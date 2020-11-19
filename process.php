<?php

 require 'cards.php'; // カード生成クラス
 require 'operate.php'; // 動作クラス
 require 'poker.php'; // ポーカーのルール判定クラス


$cards = new Cards;
$operate = new Operate;
$poker = new Poker;

// セッションの開始
$operate->startSession();

// 山札の生成
$stock = $cards->stock();

// 手札を配る
$player_hand = $operate->getHand($stock);
$enemy_hand = $operate->getHand($stock);

// 手札の画像取得
$player_show_hand = $operate->showHand($player_hand);
$enemy_show_hand = $operate->showHand($enemy_hand);

// 役判定
$player_yaku = $poker->getYaku($player_hand);
$enemy_yaku = $poker->getYaku($enemy_hand);

// セッションの終了
$operate->clearSession();
