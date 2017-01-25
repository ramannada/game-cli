<?php
namespace App;

use App\Player;

class Game
{
    private $player1, $player2;


    public function main(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        var_dump($this->player1);
        $this->player2 = $player2;
        var_dump($this->player2);
        if ($player1->getCombo() == 'kertas') {
            switch ($player2->getCombo()) {
                case "kertas":
                $player1->setStatus("seri");
                $player2->setStatus("seri");
                break;
                case "gunting":
                $player1->setStatus("kalah");
                $player2->setStatus("menang");
                break;
                case "batu":
                $player1->setStatus("menang");
                $player2->setStatus("kalah");
                break;
            }
        } elseif ($player1->getCombo() == "gunting") {
            switch ($player2->getCombo()) {
                case "kertas":
                $player1->setStatus("menang");
                $player2->setStatus("kalah");
                break;
                case "gunting":
                $player1->setStatus("seri");
                $player2->setStatus("seri");
                break;
                case "batu":
                $player1->setStatus("kalah");
                $player2->setStatus("menang");
                break;
            }
        } elseif ($player1->getCombo() == "batu") {
            switch ($player2->getCombo()) {
                case "kertas":
                $player1->setStatus("kalah");
                $player2->setStatus("menang");
                break;
                case "gunting":
                $player1->setStatus("menang");
                $player2->setStatus("kalah");
                break;
                case "batu":
                $player1->setStatus("seri");
                $player2->setStatus("seri");
                break;
            }
        }
    }

    public function getWinner()
    {
        if ($this->player1->getStatus() == "menang") {
            echo "Pemenangnya adalah " . $this->player1->getNama();
        } elseif ($this->player1->getStatus() == 'seri') {
            echo "Pertandingan seri";
        } else {
            echo "Pemenangnya adalah" . $this->player2->getNama();
        }
    }
}
?>
