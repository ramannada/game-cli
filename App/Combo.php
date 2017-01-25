<?php
namespace App;

class Combo
{
    private $combo = ["kertas", "gunting", "batu"];

    public static function getCombo()
    {
        $x = $this->combo[array_rand($this->combo,1)];
        return $x;
    }
}
?>
