<?php
namespace App;

use App\Arena;
use App\Combo;

class Player
{
    private $nama, $combo, $nilai;

    public function __construct($nama)
    {
        $this->nama = $nama;
    }
    public function setNama($nama)
    {
        $this->nama = $nama;
    }
    public function getCombo()
    {
        return $this->combo;
    }
    public function setCombo($combo)
    {
        $this->combo = $combo;
    }
    public function randCombo()
    {
        $combo = ['batu','gunting','kertas'];
        $combo = $combo[array_rand($combo,1)];
        $this->setCombo($combo);
    }
    public function setNilai($nilai)
    {
        $this->nilai = $nilai;
    }
    public function getNama()
    {
        return $this->nama;
    }

    public function getNilai()
    {
        return $this->nilai;
    }

}
 ?>
