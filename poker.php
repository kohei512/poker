<?php
class Poker
{
    private $poker;
    private $state = 0;
    private $name = array(
        0 => "ロイヤルストレートフラッシュ",
        1 => "ストレートフラッシュ",
        2 => "フォーカード",
        3 => "フルハウス",
        4 => "フラッシュ",
        5 => "ストレート",
        6 => "スリーカード",
        7 => "ツーペア",
        8 => "ワンペア",
        9 => "ブタ",
);

    /**
    * 役の名前を返却
    * @param Array $hand
    * @return string
    */
    public function getYaku($hand)
    {
        $result = $this->judge($hand);
        $yaku = $this->getName($result);
        return $yaku;
    }

    /**
    * 役の名前を取得
    * @param int
    * @return string
    */
    private function getName($state)
    {
        return $this->name[$state];
    }

    /**
     * 役の判定
     * @param Array $card
     * @return int
     */
    private function judge($hand)
    {
        if ($this->isRoyal($hand)) {
            return 0;
        }
        if ($this->isStraightFlash($hand)) {
            return 1;
        }
        if ($this->isFour($hand)) {
            return 2;
        }
        if ($this->isFullHouse($hand)) {
            return 3;
        }
        if ($this->isSameMark($hand)) {
            return 4;
        }
        if ($this->isStraight($hand)) {
            return 5;
        }
        if ($this->isThree($hand)) {
            return 6;
        }
        if ($this->isPair($hand)) {
            return 7;
        }
        if ($this->onePair($hand)) {
            return 8;
        }
        return 9;
    }

    /**
    * ロイヤルストレートフラッシュ判定
    */
    private function isRoyal($hand)
    {
        $state = false;
        $royal = array(1, 10, 11, 12 ,13);
        if($this->isStraightFlash($hand)) {
            foreach($hand as $card) {
                if(in_array($card["number"], $royal)) {
                    $state = true;
                } else {
                    $state = false;
                    break;
                }
            }
        }
        return $state;
    }

    /**
    * ストレートフラッシュ判定
    */
    private function isStraightFlash($hand)
    {
        return ($this->isStraight($hand) && $this->isSameMark($hand));
    }

    /**
    * フォーカード判定
    */
    private function isFour($hand)
    {
        $state = $this->searchPair($hand);
        rsort($state);
        if (array_shift($state) == 4) {
            return true;
        }
        return false;
    }

    /**
    * フルハウス判定
    */
    private function isFullhouse($hand)
    {
        $state = $this->searchPair($hand);
        rsort($state);
        if (array_shift($state) == 3 && array_shift($state) == 2) {
            return true;
        }
        return false;
    }

    /**
    * スリーカード判定
    */
    private function isThree($hand)
    {
        $state = $this->searchPair($hand);
        rsort($state);
        if (array_shift($state) == 3) {
            return true;
        }
        return false;
    }

    /**
    * ツーペア判定
    */
    private function isPair($hand)
    {
        $state = $this->searchPair($hand);
        rsort($state);
        if (array_shift($state) == 2) {
            if (array_shift($state) == 2) {
            return true;
            }
        }
        return false;
    }

    /**
    * ワンペア判定
    */
    private function onePair($hand)
    {
        $state = $this->searchPair($hand);
        rsort($state);
        if (array_shift($state) == 2) {
            return true;
        }
        return false;
    }

    /**
    * 同じマークがあるか判定
    */
    private function isSameMark($hand)
    {
        $state = true;
        $mark = "";
        foreach ($hand as $card) {
            if ($mark !== "" && $mark !== $card["mark"]) {
                $state = false;
                break;
            }
            $mark = $card["mark"];
        }
        return $state;
    }

    /**
    * ストレート判定
    */
    private function isStraight($hand)
    {
        $numbers = array();
        foreach ($hand as $card) {
            $numbers[] = $card["number"];
        }
        $last = 0;
        sort($numbers);
        $state = true;
        foreach ($numbers as $number) {
            if ($last == 1 && $number == 10) {
                $last = $number;
                continue;
            }
            if ($last !== 0 && $number-$last != 1) {
                $state = false;
                break;
            }
            $last = $number;
        }
        return $state;
    }

    /**
     * ペアを数え上げる
     */
    private function searchPair($hand)
    {
        $state = array();
        foreach ($hand as $card) {
            if (!isset($state[$card["number"]])) {
                $state[$card["number"]] = 0;
            }
            $state[$card["number"]]++;
        }
        return $state;
    }
}
