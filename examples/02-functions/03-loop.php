<?php


// 3. Skriv en funktion som tar ett startvärde och ett slutvärde som argument. Slutvärdet ska ha ett default-värde. Funktionen ska med hjälp av en loop anropa din andra funktion en gång för varje värde.

function double ($x) {
    return $x * 2;
}

function loop($start, $end = 10) {
    echo "Looping from $start to $end:" . PHP_EOL;
    for ($i = $start; $i <= $end; $i++) {
        echo double($i) . PHP_EOL;
    }
}

loop(2, 5);
loop(8);
