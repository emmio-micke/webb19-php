<?php


// 4. Skriv en funktion som konverterar grader i F till C.

function toCelsius ($deg) {
    return ($deg - 32) * (5/9);
}

echo toCelsius(100);
