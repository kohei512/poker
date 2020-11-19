<?php
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
        
        $numbers = range(1, 13);

        // 山札の生成（$stock）
        $stock = array();
        $card = array();
        for ($i = 0; $i < count($marks); $i++) {
            foreach ($numbers as $number) {
                $card['mark'] = $marks[$i];
                $card['number'] = $number;

                array_push($stock, $card);

            }
        }
        shuffle($stock);
        return $stock;
    }

}
