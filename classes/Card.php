<?php 

class Card {
    public function __construct(private int $id, private string $backgroundImage){}
    
    public function getBackgroundImage(): string {
        return $this->backgroundImage;
    }
}
?>