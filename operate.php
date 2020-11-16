<?php
/**
 * 動作クラス
 * 問題①に回答して下さい
 */
class Operate
{
    /**
     * セッションの開始
     * @see getHand 山札の保存で使用
     */
    public function startSession()
    {
        session_start();
    }

    /**
     * セッションの終了
     */
    public function clearSession()
    {
        $_SESSION = '';
        session_destroy();
    }

    /**
     * 手札を配る
     * @param Array $stock 山札
     * @return Array $hand 手札
     */
    public function getHand($stock)
    {
        // 山札の残りが保存されていれば、再使用する（１人目は通らない）
        if (!empty($_SESSION['rest'])) {
            $stock = $_SESSION['rest'];
        }

        // 手札を配る
        $hand = array();
        for ($i = 0; $i < 5; $i++) {
            $hand[] = array_shift($stock);
        }

        // 山札の残りを保存
        // 問題① 配った手札を覗いた残りの山札を、$_SESSION['rest']に代入して下さい。
        $_SESSION['rest'] = $stock;

        return $hand;
    }

    /**
     * 手札の画像取得
     * @param Array $hand 手札
     * @return string 画像ファイル名（.png）
     */
    public function showHand($hand)
    {
        $show_hand = array();
        foreach ($hand as $card) {
            $show_hand[] = $card['mark'] .'_'. $card['number'];
        }

        return $show_hand;
    }

}
