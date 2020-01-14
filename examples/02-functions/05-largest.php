<?php


// 5. Skriv en funktion som tar två värden och skriver ut det största värdet.

function largest($x, $y) {
    if ($x > $y) {
        echo $x . PHP_EOL;
    }
    else {
        echo $y . PHP_EOL;
    }
}

largest(5, 10);
largest(15, 10);
