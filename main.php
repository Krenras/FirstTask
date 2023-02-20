<?php
include 'Card.php';
echo '<h3>Info</h3>';

    $cardNum = $_POST['cardNum'];

    $card = new Card($cardNum);

    echo 'Your card is ' . $card->num . '<br>';

    echo $card->valid . '<br>';
    echo $card->nameOfEmit . '<br>';