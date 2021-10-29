<?php

declare(strict_types=1);

class Player {
    // properties
    private $cards = array();
    private $lost = false;

    const TARGET = 21;

    public function __construct(Deck $deck) {
        Array_push($this->cards, $deck->drawCard());
        Array_push($this->cards, $deck->drawCard());
    }

    // methods
    public function hit(Deck $deck) {
        Array_push($this->cards, $deck->drawCard());
        $newScore = $this->getScore();
        if ($newScore > player::TARGET) {
            $this->lost = true;
        }
    }

    public function surrender() {
        $this->lost = true;
    }

    public function getScore(): int {
        $score = 0;
        foreach ($this->cards as $card) {
            $score += $card->getValue();
        }
        return $score;
    }

    public function hasLost(): bool {
        return $this->lost;
    }

    public function getCards() {
        return $this->cards;
    }
}
