<?php

// SUMMARY
// Use protected properties and methods can only be accessed within the class and in any child classes of the class.

class Customer
{
    // protected property
    public function __construct(protected $name)
    {
    }

    protected function format()
    {
        return ucwords($this->name);
    }

    public function getName()
    {
        return $this->format();
    }
}

class VIP extends Customer
{
    protected function format()
    {
        return strtoupper($this->name);
    }
}

$customer = new Customer('daffa ravfriza');
echo $customer->getName();

$vip = new VIP('daffa ravfriza');
echo $vip->getName();
