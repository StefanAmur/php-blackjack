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


if ($player->getScore() > Player::TARGET) {
    $player->surrender();
}

if (isset($_POST['hit'])) {
    $player->hit($deck);
    if ($player->getScore() == Player::TARGET) {
        $dealer->surrender();
    }
}

if (isset($_POST['stay'])) {
    $dealer->hit($deck);
    $dealerScore = $dealer->getScore();
    if ($dealerScore > $player->getScore() && $dealerScore <= 21) {
        $result = "The house always wins, unless it doesn't";
    }
}

if (isset($_POST['surrender'])) {
    $player->surrender();
}

if (isset($_POST['new'])) {
    session_unset();
    $_SESSION['game'] = new Blackjack();
    $deck = $_SESSION['game']->getDeck();
    $player = $_SESSION['game']->getPlayer();
    $dealer = $_SESSION['game']->getDealer();
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


    <form action="index.php" method="POST" class="btn-form">
        <button class="btn btn-hit" type="submit" name="hit">Hit!</button>
        <button class="btn btn-stay" type="submit" name="stay">Stay!</button>
        <button class="btn btn-surrender" type="submit" name="surrender">Surrender!</button>
        <button class="btn btn-new" type="submit" name="new">New game</button>

    </form>

</body>

</html>