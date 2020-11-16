<?php
/**
 * 裏側処理用ページ
 * 問題①〜⑥に回答して下さい
 */

 // 問題①
 // カード生成クラス、動作クラス、ポーカーのルール判定クラスがあるPHPファイルをそれぞれ読み込んで下さい
 require 'cards.php'; // カード生成クラス
 require 'operate.php'; // 動作クラス
 require 'poker.php'; // ポーカーのルール判定クラス

 // 問題②
 // Cardsクラス、Operateクラス、Pokerクラスのインスタンスを作り、それぞれ変数に代入して下さい
$cards = new Cards;
$operate = new Operate;
$poker = new Poker;

// セッションの開始
$operate->startSession();

// 山札の生成
// 問題③ 山札を作成する関数を実行し、戻り値を$stockに代入して下さい
$stock = $cards->stock();

// 手札を配る
// 問題④ 手札を取得する関数を実行し、戻り値をそれぞれの変数に代入して下さい
$player_hand = $operate->getHand($stock);
$enemy_hand = $operate->getHand($stock);

// 手札の画像取得
// 問題⑤ 手札の表示に使う画像ファイル名を取得する関数を実行し、戻り値をそれぞれの変数に代入して下さい
$player_show_hand = $operate->showHand($player_hand);
$enemy_show_hand = $operate->showHand($enemy_hand);

// 役判定
// 問題⑥ 手札の役の種類を判定する関数を実行し、戻り値をそれぞれの変数に代入して下さい
$player_yaku = $poker->getYaku($player_hand);
$enemy_yaku = $poker->getYaku($enemy_hand);

// セッションの終了
$operate->clearSession();
