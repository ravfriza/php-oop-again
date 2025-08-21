<?php

// SUMMARY
// Use the public access modifier to allow access to properties and methods from both inside and outside of the class.
// Use the private access modifier to prevent access from the outside of the class.
// Do use private properties with a pair of public getter/setter methods.

class Customer
{
    private $name;

    public function setName($name)
    {
        $name = trim($name);

        if($name == '') {
            return false;
        }

        $this->name = $name;

        return true;
    }

    public function getName()
    {
        return $this->name;
    }
}

$customer = new Customer();

$customer->setName('Leon Scott Kennedy');

echo "Hello! {$customer->getName()}";