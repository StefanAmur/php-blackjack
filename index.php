<?php

declare(strict_types=1);

require './Suit.php';
require './Card.php';
require './Deck.php';
require './Player.php';
require './Blackjack.php';

session_start();

if (!isset($_SESSION['game'])) {
    $_SESSION['game'] = new Blackjack();
}

$deck = $_SESSION['game']->getDeck();
$player = $_SESSION['game']->getPlayer();
$dealer = $_SESSION['game']->getDealer();

// var_dump($player);

if (isset($_POST['hit'])) {
    echo "Hit button was... hit!";
    $player->hit($deck);
}

if (isset($_POST['stay'])) {
    echo "The Stay button was clicked, bro!";
}

if (isset($_POST['surrender'])) {
    echo "I give up, you win... but only because I can't be bothered atm!";
}

if (isset($_POST['new'])) {
    session_unset();
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
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <section class="deck">
        <section class="dealer">
            <h2 class="title">Dealer's hand</h2>
            <h3 class="score">Dealer's score: <?php echo $dealer->getScore(); ?></h3>
            <p class="card">
                <?php
                foreach ($dealer->getCards() as $card) {
                    echo $card->getUnicodeCharacter(true);
                } ?>
            </p>
        </section>

        <section class="player">
            <h2 class="title">Your hand</h2>
            <h3 class="score">Your score: <?php echo $player->getScore(); ?></h3>
            <p class="card">
                <?php
                foreach ($player->getCards() as $card) {
                    echo $card->getUnicodeCharacter(true);
                } ?>
            </p>
        </section>
    </section>


    <form action="index.php" method="POST" class="btn-form">
        <button class="btn" type="submit" name="hit">Hit!</button>
        <button class="btn" type="submit" name="stay">Stay!</button>
        <button class="btn" type="submit" name="surrender">Surrender!</button>
        <button class="btn" type="submit" name="new">New game</button>

    </form>

</body>

</html>