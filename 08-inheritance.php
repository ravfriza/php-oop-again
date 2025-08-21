<?php

// SUMMARY
// Inheritance allows a class to reuse the code of another class without duplicating it.
// Use the extends keyword to define one class that inherits from another class.
// A class that inherits another class is called a subclass, a child class, or a derived class. The class from which the subclass inherits is a parent class, a superclass, or a base class.
// A subclass can have its own properties and methods.
// Use $this keyword to call the methods of the parent class from methods in the child class.

class BankAccount
{
    private $balance;

    public function getBalance()
    {
        return $this->balance;
    }

    public function deposit($amount)
    {
        if($amount > 0) {
            $this->balance += $amount;
        }
        
        return $this;
    }
}

class SavingAccount extends BankAccount
{
    private $interestRate;

    public function setInterestRate($interestRate)
    {
        $this->interestRate = $interestRate;
    }

    public function addInterest()
    {
        $interest = $this->interestRate * $this->getBalance();
        $this->deposit($interest);
    }
}

$account = new SavingAccount();
$account->deposit(2000);
$account->setInterestRate(0.10);
$account->addInterest();

echo "Your balance after 10% interest is {$account->getBalance()}";


