<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Match up!</title>
</head>
<body>
  <div class="container">
    <div id="counter">0</div>
    <div id="board">
        <?php
            include('classes/Deck.php');
            $cards = (new Deck()) -> getCards();
            for($i = 0; $i < count($cards); ++$i) { 
              echo '<div class="card" data-flipped="false" data-background="'.$cards[$i]->getBackgroundImage().'"></div>';
          } 
        ?>
    </div>
  </div>
</body>
<!-- TODO: Play with script position -->
<script>
const cards = document.querySelectorAll('.card');

cards.forEach(card => {
  card.addEventListener('click', function () {
    const isFlipped = card.dataset.flipped === "true";
    card.dataset.flipped = isFlipped ? "false" : "true";
    card.style.backgroundImage = isFlipped 
      ? "url('assets/naipe.jpg')" 
      : "url('assets/"+card.dataset.background+"')";

    flippedCards = document.querySelectorAll('[data-flipped="true"]');
    if(flippedCards.length == 2 && matchFlippedCards(flippedCards)) {
        flippedCards[0].style.pointerEvents = 'none';
        flippedCards[1].style.pointerEvents = 'none';
    }
  });
});



function matchFlippedCards(flippedCards) {
  return flippedCards[0].dataset.background == flippedCards[1].dataset.background;
}

let seconds = 0;

const counterEl = document.getElementById('counter');

setInterval(() => {
  seconds++;
  counterEl.textContent = seconds;
}, 1000);

</script>

</html>
