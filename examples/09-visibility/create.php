<?php

class Student
{
    private $name;

    public function setName($name)
    {
        if (is_null($name)) {
            throw new Exception("Name can't be null");
        }

        if (is_object($name)) {
            throw new Exception("Name can't be object");
        }

        if ($name == '') {
            throw new Exception("Name can't be empty");
        }

        $this->name = $name;
    }
}

$student = new Student();

// $student->name = "Kalle";

// $student->setName(new stdClass());
// $student->setName(null);
$student->setName("Kalle");


print_r($student);
