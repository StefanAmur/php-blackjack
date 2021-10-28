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

var_dump($_SESSION['game']);
