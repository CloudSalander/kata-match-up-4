<?php 
include 'Card.php';

class Deck {

    const N_CARDS = 16;
    const CARD_BACKGROUNDS = [
        "clubAce.png","clubKnight.png","cupKnight.png","cupsAce.png","goldAce.png","goldKnight.png","swordKnight.png",
        "swordAce.png" ];
    
    private array $cards;
    
    public function __construct() {
        for($i = 0; $i < self::N_CARDS; ++$i) {
            $backgroundImage = self::CARD_BACKGROUNDS[intdiv($i,2)];
            $this->cards[] = new Card($i+1, $backgroundImage);
        }
        shuffle($this->cards);
    }

    public function getCards(): array {
        return $this->cards;
    }
}