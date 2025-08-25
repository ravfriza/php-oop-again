<?php

abstract class Person
{
    public abstract function greet();
}

class Jawa extends Person
{
    public function greet()
    {
        return 'Piye kabare!';
    }
}

class Sunda extends Person
{
    public function greet()
    {
        return 'Kumaha damang!';
    }
}

class Betawi extends Person
{
    public function greet()
    {
        return 'Gimane kabarnye!';
    }
}

function greeting($people)
{
    foreach($people as $person){
        echo $person->greet();
    }
}

$people = [
    new Jawa(),
    new Sunda(),
    new Betawi()
];

greeting($people);