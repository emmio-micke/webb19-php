<?php

$students = [
    [
        "name" => "Kalle",
        "age" => 22
    ],
    [
        "name" => "Stina",
        "age" => 23
    ],
    [
        "name" => "Jessica",
        "age" => 25
    ]
];

foreach ($students as $index => $student) {
    foreach ($student as $key => $value) {
        echo "$index - $key: $value" . PHP_EOL;
    }
    echo "---" . PHP_EOL;
}
