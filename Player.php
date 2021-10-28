<?php

declare(strict_types=1);

class Player {
    // properties
    private $cards = array();
    private $lost = false;

    public function __construct(Deck $deck) {
        Array_push($this->cards, $deck->drawCard());
        Array_push($this->cards, $deck->drawCard());
    }

    // methods
    public function hit(): void {
    }

    public function surrender(): void {
    }

    public function getScore(): int {
        $score = 0;
        foreach ($this->cards as $card) {
            $score += $card->value;
        }
        return $score;
    }

    public function hasLost(): void {
    }
}
