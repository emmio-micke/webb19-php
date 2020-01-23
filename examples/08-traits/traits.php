<?php

/*
Skapa två stycken traits.
Den ena ska implementera metoden booking() som tar ett datum och ett objekt som parameter och skriva ut ett meddelande om att en bokning är skapad för besiktning för fordonet.
Den andra ska implementera metoden paint() som tar en parameter och byter färg på fordonet.
Använd trait:sen i Vehicle-klassen och anropa dem från dina objekt.
*/

trait Booking
{
    public $test;

    public function booking($booking_date)
    {
        $this->test = "1";
        echo "Booking created at " . $booking_date . PHP_EOL;
    }
}

trait Maintenance
{
    public function paint($color)
    {
        $this->color = $color;
    }
}


class Vehicle
{
    use Booking;
    use Maintenance;

    public $make;
    public $model;
    public $color;

    public function test()
    {
        $this->test = "2";
        echo "test: " . $this->test . PHP_EOL;
        $this->booking("2020-01-25");
        $this->paint("red");
    }
}

class Movie {
    use Booking;
}

$car = new Vehicle;

print_r($car);

$car->test();

print_r($car);

$movie = new Movie();

$movie->booking("2020-01-20");

print_r($movie);
