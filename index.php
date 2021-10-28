<?php

declare(strict_types=1);

require 'Suit.php';
require 'Card.php';
require 'Deck.php';
require 'Player.php';
require 'Blackjack.php';

session_start();

if (!isset($_SESSION['game'])) {
    $_SESSION['game'] = new Blackjack();
}

// var_dump($_SESSION['game']);

if (isset($_POST['hit'])) {
    echo "Hit button was... hit!";
}

if (isset($_POST['stay'])) {
    echo "The Stay button was clicked, bro!";
}

if (isset($_POST['surrender'])) {
    echo "I give up, you win... but only because I can't be bothered atm!";
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>

    <section class="dealer">
        <div class="card"></div>
        <div class="card"></div>
        <div class="card"></div>
        <div class="card"></div>
        <div class="card"></div>
    </section>

    <section class="player">
        <div class="card"></div>
        <div class="card"></div>
        <div class="card"></div>
        <div class="card"></div>
        <div class="card"></div>
    </section>

    <form action="index.php" method="POST" class="btn-form">
        <button class="btn" type="submit" name="hit">Hit!</button>
        <button class="btn" type="submit" name="stay">Stay!</button>
        <button class="btn" type="submit" name="surrender">Surrender!</button>
    </form>

</body>

</html>