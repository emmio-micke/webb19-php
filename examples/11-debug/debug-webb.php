<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

class Vehicle {
    public $color;
    private $model;

    public function __construct() {
        $this->color = "red";
        $this->model = "Volvo";
    }
}

// $car = new Vehicle();

function pr($var) {
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

$array = ['Hello', 'world'];

if (is_array($array)) {
    // Do something
    echo "1";
} else {
    // Do something else
    echo "2";
}

pr($array);
?>
</body>
</html>