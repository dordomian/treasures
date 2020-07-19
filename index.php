<?php

require_once 'autoloader.php';

use App\TreasuresHunterGame;
use App\TreasuresWorld;

$path = getopt(null, ["path:"])['path'] ?? NULL;

$obj = new TreasuresHunterGame(new TreasuresWorld());

$result = $obj->findMostCommonTreasureIndex($path);

echo $result;