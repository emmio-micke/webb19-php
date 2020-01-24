<?php

//$var = 'value';

/*
if (isset($var)) {
    echo $var;
} else {
    echo 'variable is NOT set';
}
*/

// echo isset($var) ? $var : 'variable is NOT set';

echo $var ?? 'variable is NOT set';
