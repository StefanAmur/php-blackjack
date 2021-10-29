<?php

declare(strict_types=1);

require './Suit.php';
require './Card.php';
require './Deck.php';
require './Player.php';
require './Blackjack.php';
require './Dealer.php';

session_start();

if (!isset($_SESSION['game'])) {
    $_SESSION['game'] = new Blackjack();
}

$deck = $_SESSION['game']->getDeck();
$player = $_SESSION['game']->getPlayer();
$dealer = $_SESSION['game']->getDealer();

$result = "";
$dealerScore = "";

if ($player->getScore() > Player::TARGET) {
    $player->surrender();
    $result = "You lost!";
}

if (isset($_POST['hit'])) {
    $player->hit($deck);
    if ($player->getScore() == Player::TARGET) {
        $dealer->surrender();
        $result = "You won!";
    } else if ($player->getScore() > Player::TARGET) {
        $player->surrender();
        $dealerScore = $dealer->getScore();
        $result = "You lost!";
    }
}

if (isset($_POST['stay'])) {
    $playerScore = $player->getScore();
    if ($playerScore == Player::TARGET) {
        $dealer->surrender();
        $result = "You won!";
    } else {
        $dealer->hit($deck);
        $dealerScore = $dealer->getScore();
        if ($dealerScore >= $playerScore && $dealerScore <= Player::TARGET) {
            $player->surrender();
            $result = "You lost!";
        } else {
            $result = "You won";
        }
    }
}

if (isset($_POST['surrender'])) {
    $player->surrender();
    $dealerScore = $dealer->getScore();
    $result = "You lost!";
}

if (isset($_POST['new'])) {
    session_unset();
    $_SESSION['game'] = new Blackjack();
    $deck = $_SESSION['game']->getDeck();
    $player = $_SESSION['game']->getPlayer();
    $dealer = $_SESSION['game']->getDealer();
    $result = "";
    $dealerScore = "";
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
            <h3 class="score">Dealer's score: <?php echo $dealerScore; ?></h3>
            <p class="card card-dealer">
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

    <section class="result-container">
        <h2 class="title"><?php echo $result; ?></h2>
    </section>

    <form action="index.php" method="POST" class="btn-form">
        <button class="btn btn-hit" type="submit" name="hit">Hit!</button>
        <button class="btn btn-stay" type="submit" name="stay">Stay!</button>
        <button class="btn btn-surrender" type="submit" name="surrender">Surrender!</button>
        <button class="btn btn-new" type="submit" name="new">New game</button>

    </form>

</body>

</html>