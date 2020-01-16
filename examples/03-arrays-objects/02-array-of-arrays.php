<?php

$course = [
    "teacher" => "Micke",
    "students" => [
        [
            "name" => "Kalle",
            "age" => 25
        ]
    ]
];

$course["students"][] = [
    "name" => "Stina",
    "age" => 28
];

print_r($course);
