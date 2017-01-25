<?php
namespace App;

use App\Player;
// use App\Combo;

class Game
{
    private $player1, $player2, $mode, $ronde;

    public function __construct()
    {
        $this->player1 = new Player(" ");
        $this->player2 = new Player(" ");

    }

    public static function greeting()
    {
        echo "------------------------------------" . "\n" .
                "|         Permainan Suit           |" . "\n" .
                "|     Batu | Gunting | Kertas      |" . "\n" .
                "------------------------------------" . "\n" ;
    }
    public function start()
    {
        $this->resetPlayer();
        system('clear');
        self::greeting();
    }
    public function pilihMode()
    {
        echo "       Pilih mode permainan      " ."\n" .
        "     a. 1 Player b. 2 Player" . "\n";
        $mode = trim(fgets(STDIN));
        if ($mode == 'a') {
            $mode = "1 player";
            $this->mode = $mode;

            echo "Masukkan nickname: ";
            $nama = trim(fgets(STDIN));

            $this->player1->setNama("labib");
            $this->player2->setNama("CPU");
        } elseif ($mode == 'b') {
            $mode = "2 player";
            $this->mode = $mode;

            echo "Masukkan nickname player 1: ";
            $this->player1->setNama(trim(fgets(STDIN)));
            echo "Masukkan nickname player 2: ";
            $this->player2->setNama(trim(fgets(STDIN)));
        } else {
            echo "Ketik a untuk 1 player dan ketik b untuk bermain 2 player" . "\n";
            $mode = $this->pilihMode();
        }
    }
    public function pilihRonde()
    {
        echo "       Berapa putaran main?      " ."\n" .
        "a. 1 putaran b. 3 putaran c. 5 putaran " . "\n";
        $ronde = trim(fgets(STDIN));
        if ($ronde == 'a') {
            $this->ronde = 1;
        } elseif ($ronde == 'b') {
            $this->ronde = 3;
        } elseif ($ronde == 'c') {
            $this->ronde = 5;
        }else {
            echo "Ketik a untuk 1x main, b untuk 3x main, c untuk 5x main." . "\n";
            $ronde = $this->pilihRonde();
        }
    }
    public function pilihCombo($player)
    {
        echo "Pilihan combo \n" .
                " a. Batu  b. Gunting  c. Kertas " . "\n";
        system('stty -echo');
        $combo = trim(fgets(STDIN));
        system('stty echo');
        if ($combo == "a") {
            $player->setCombo("batu");
        } elseif ($combo == "b") {
            $player->setCombo("gunting");
        } elseif ($combo == "c") {
            $player->setCombo("kertas");
        } else {
            $this->pilihCombo();
        }
    }
    public function resetPlayer()
    {
        $this->player1->setNilai(0);
        $this->player2->setNilai(0);
    }
    public function proses()
    {
        if ($this->player1->getCombo() == 'kertas') {
            switch ($this->player2->getCombo()) {
                case "kertas":
                // $this->player1->setNilai("seri");
                // $this->player2->setNilai("seri");
                break;
                case "gunting":
                $nilai = $this->player2->getNilai();
                $this->player2->setNilai($nilai + 1);
                break;
                case "batu":
                $nilai = $this->player1->getNilai();
                $this->player1->setNilai($nilai + 1);
                // $this->player2->setNilai("kalah");
                break;
                default:
                echo "terjadi kesalahan";
            }
        } elseif ($this->player1->getCombo() == "gunting") {
            switch ($this->player2->getCombo()) {
                case "kertas":
                $nilai = $this->player1->getNilai();
                $this->player1->setNilai($nilai + 1);
                break;
                case "gunting":
                // $this->player1->setNilai("seri");
                // $this->player2->setNilai("seri");
                break;
                case "batu":
                // $this->player1->setNilai("kalah");
                $nilai = $this->player2->getNilai();
                $this->player2->setNilai($nilai + 1);
                break;
                default:
                echo "terjadi kesalahan";
            }
        } elseif ($this->player1->getCombo() == "batu") {
            switch ($this->player2->getCombo()) {
                case "kertas":
                // $this->player1->setNilai("kalah");
                $nilai = $this->player2->getNilai();
                $this->player2->setNilai($nilai + 1);
                break;
                case "gunting":
                $nilai = $this->player1->getNilai();
                $this->player1->setNilai($nilai + 1);
                // $this->player2->setNilai("kalah");
                break;
                case "batu":
                // $this->player1->setNilai("seri");
                // $this->player2->setNilai("seri");

                break;
                default:
                echo "terjadi kesalahan";
            }
        }
    }
    public function main()
    {
        if ($this->mode == '1 player') {
            for ($i=1; $i <= $this->ronde; $i++) {
                echo "Player 1 masukkan combo: \n";
                $this->pilihCombo($this->player1);
                $this->player2->randCombo();

                echo $this->player1->getNama() . " mengeluarkan " . $this->player1->getCombo() . "\n" .
                         $this->player2->getNama() . " mengeluarkan " . $this->player2->getCombo() ."\n";

                $this->proses();
            }
        } else {


            for ($i=1; $i <= $this->ronde; $i++) {
                echo "Player 1 masukkan combo: \n";
                $this->pilihCombo($this->player1);
                echo "Player 2 masukkan combo: \n";
                $this->pilihCombo($this->player2);
                echo "\n \n" . $this->player1->getNama() . " mengeluarkan " . $this->player1->getCombo() . "\n" .
                         $this->player2->getNama() . " mengeluarkan " . $this->player2->getCombo() ."\n \n";

                $this->proses();
            }
        }
    }

    public function getWinner()
    {
        if ($this->player1->getNilai() > $this->player2->getNilai()) {
            echo "\n Pemenangnya adalah " . $this->player1->getNama() . "\n";
        } elseif ($this->player1->getNilai() < $this->player2->getNilai()) {
            echo "\n Pemenangnya adalah " . $this->player2->getNama() . "\n";
        } else {
            echo "\n Pertandingan seri" . "\n";
        }
    }
    function loop()
    {
        echo "\n Permainan selesai \n".
        "a. Main lagi b. Kembali ke pilih ronde c. kembali ke pilih mode q. keluar \n";
        $pilihan = trim(fgets(STDIN));
        switch ($pilihan) {
            case 'a':
                $this->start();
                $this->main();
                $this->getWinner();
                $this->loop();
                break;
            case 'b':
                $this->start();
                $this->pilihRonde();
                $this->main();
                $this->getWinner();
                $this->loop();
                break;
            case 'c':
                $this->start();
                $this->pilihMode();
                $this->pilihRonde();
                $this->main();
                $this->getWinner();
                $this->loop();
                break;
            case 'q':
                system('clear');
                exit();
                break;
            default:
                echo "Ketik a untuk Main lagi | b untuk kembali ke pilih ronde | c untuk kembali ke pilih mode | q untuk keluar \n";
                $this->loop();
                break;
        }
    //     if ($pilihan == 'a') {
    //         $this->main();
    //         $this->getWinner();
    //         $this->loop();
    //     } elseif ($ronde == 'b') {
    //         $this->pilihRonde();
    //         $this->main();
    //         $this->getWinner();
    //         $this->loop();
    //     } elseif ($ronde == 'c') {
    //         $this->pilihMode();
    //         $this->pilihRonde();
    //         $this->main();
    //         $this->getWinner();
    //         $this->loop();
    //     } elseif ($ronde == "q") {
    //         // system('quit');
    //         system('kill -php');
    //     } else {
    //         echo "Ketik a untuk Main lagi | b untuk kembali ke pilih ronde | c untuk kembali ke pilih mode | q untuk keluar \n";
    //         $this->loop();
    //     }
    }
}
?>
