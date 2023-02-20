<?php
class Card
{
    public string $num;
    public ?string $valid;
    public string $nameOfEmit;

    public function __construct(string $cardNum)
    {
        $this->num = $cardNum;
        $this->valid = $this->validationOfCardNum($cardNum);
        $this->nameOfEmit = $this->getNameOfEmit($cardNum);
    }

    public function validationOfCardNum(string $cardNum): string|null
    {
        $s = strrev(preg_replace('/[^\d]/', '', $cardNum));
        $sum = 0;
        for ($i = 0, $j = strlen($s); $i < $j; $i++) {
            if (($i % 2) == 0) {
                $val = $s[$i];
            } else {
                $val = $s[$i] * 2;
                if ($val > 9) $val -= 9;
            }
            $sum += $val;
        }

        if (($sum % 10) == 0) {
            return "Valid";
        } elseif (($sum % 10) !== 0) {
            return "Invalid";
        }
        return null;
    }

    public function getNameOfEmit(string $cardNum): string
    {
        $cardNum = preg_replace('/[^\d]/', '', $cardNum);
        if (preg_match('/^(5[1-5]|62|67)+[0-9]{11,17}$/', $cardNum)) {
            return "MasterCard";
        } elseif (preg_match('/^(4[0-9]|14)+[0-9]{11,17}$/', $cardNum)) {
            return "Visa";
        } elseif (preg_match('/^(22)+[0-9]{11,17}$/', $cardNum)) {
            return "Мир";
        } else {
            return "Card isn't valid";
        }
    }
}