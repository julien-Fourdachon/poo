<?php

include '../models/Database.php';

session_start();

if (count($_POST) != 2) {
    header('Location: /validation-julien-fourdachon');
    exit();
}

$_SESSION['fighters'] = [];

foreach ($_POST as $characterId) {
    $character = Database::getOneCharacter($characterId);
    array_push($_SESSION['fighters'], $character);
}

// var_dump($_SESSION);
// die;

$_SESSION['fighting'] = true;
header('Location: /validation-julien-fourdachon');
exit();





