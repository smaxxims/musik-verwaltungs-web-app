<?php

class Util
{
    public function makeRandomNumsInStringOfNum(int $num): string
    {
        $string = "";
        for ($i = 0; $i < $num; $i++) {
            $string = $string . random_int(0, 9);
        }
        return $string;
    }

    public function valStr($inputString): string
    {
        return $validString  = htmlspecialchars(trim($inputString), ENT_QUOTES, 'UTF-8');
    }
}