<?php

$var = ['hello', 'world'];

function a()
{
    b();
}

function b()
{
    c();
}

function c()
{
    debug_print_backtrace();
}

// a();

function a_test($str)
{
    echo "\nHi: $str";
    var_dump(debug_backtrace());
}

a_test('friend');

// print_r($var);
// var_dump($var);
// var_dump(get_defined_vars());
// debug_print_backtrace();
debug_backtrace();
