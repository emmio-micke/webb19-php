<?php

function myTest()
{
    static $x = 0;
    echo $x . PHP_EOL;
    $x++;
}

myTest();
myTest();
myTest();
