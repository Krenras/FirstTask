<?php
class Card
{
    public string $num;
    public string $valid;
    public string $nameOfEmit;

    public function __construct(string $cardNum)
    {
        $cardNum = preg_replace('/[^\d]/', '', $cardNum);
        $this->num = $cardNum;
        $this->valid = $this->validationOfCardNum($cardNum);
        $this->nameOfEmit = $this->getNameOfEmit($cardNum);
    }

    public function validationOfCardNum(string $cardNum): string|null
    {
        $cardNum = strrev($cardNum);
        $controllSum = 0;
        for ($i = 0, $j = strlen($cardNum); $i < $j; $i++) {
            if (($i % 2) == 0) {
                $val = $cardNum[$i];
            } else {
                $val = $cardNum[$i] * 2;
                if ($val > 9) $val -= 9;
            }
            $controllSum += $val;
        }

        if (($controllSum % 10) == 0) {
            return "Valid";
        } elseif (($sum % 10) !== 0) {
            return "Invalid";
        }
        return null;
    }

    public function getNameOfEmit(string $cardNum): string
    {
        if (isMasterCard($cardNum)) {
            return "MasterCard";
        } elseif (isVisa($cardNum)) {
            return "Visa";
        } elseif (isMir($cardNum)) {
            return "Мир";
        } else {
            return "Card isn't valid";
        }
    }

    private function isMasterCard(string $cardNum):bool
    {
        if(preg_match('/^(5[1-5]|62|67)+[0-9]{11,17}$/', $cardNum))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    private function isVisa(string $cardNum):bool
    {
        if(preg_match('/^(5[1-5]|62|67)+[0-9]{11,17}$/', $cardNum))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    private function isMir(string $cardNum):bool
    {
        if(preg_match('/^(5[1-5]|62|67)+[0-9]{11,17}$/', $cardNum))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}