<?php
require_once __DIR__ . "/vendor/autoload.php";

use App\Player;
use App\Game;
use App\Combo;

$game = new Game;
Game::greeting();
$game->pilihMode();
$game->pilihRonde();
$game->main();
$game->getWinner();
$game->loop();


// $game->inputPlayer();
// $combo = new Combo;
// echo $combo->getCombo();
// $budi = new Player("budi");
// $andi = new Player("andi");
//
// $budi->setCombo("kertas");
// $andi->setCombo("kertas");
//
// $arena->duel($budi, $andi);
// echo $budi->getNama();
// $arena->getWinner();
?>
