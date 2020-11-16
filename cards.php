<?php
/**
 * カード生成クラス
 * 問題①〜②に回答して下さい
 */
class Cards
{
    // マークの定義
    private $marks = array('spades', 'hearts', 'diams', 'clubs');

    /**
     * 山札の生成
     * @return Array
     */
    public function stock()
    {
        $marks = $this->marks;
        // 問題① 変数$numbersを作り、数値の1〜13が入った配列を代入して下さい。
        // 直接全ての数値を設定したり、ループ文を使用するなど方法がありますが、
        // 簡単に作れる組み込み関数もあるので調べてみましょう
        $numbers = range(1, 13);

        // 山札の生成（$stock）
        $stock = array();
        $card = array();
        for ($i = 0; $i < count($marks); $i++) {
            foreach ($numbers as $number) {
                $card['mark'] = $marks[$i];
                $card['number'] = $number;

                // 問題② 配列変数$stockの末尾に、配列変数$cardの内容を追加して下さい。
                // 組み込み関数でも実装可能です
                array_push($stock, $card);

            }
        }
        shuffle($stock);
        return $stock;
    }

}
