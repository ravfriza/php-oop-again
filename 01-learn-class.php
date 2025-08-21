<?php

// SUMMARY
// Objects have states and behaviors.
// A class is a blueprint for creating objects.
// Properties represent the object’s state, and methods represent the object’s behavior. Properties and methods have visibility.
// Use the new keyword to create an object from a class.
// The $this variable references the current object of the class.

class BankAccount
{
    public $accountNumber;
    public $balance;

    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }

    public function withdraw($amount)
    {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
            return true;
        }
        return false;
    }
}

$account = new BankAccount();

$account->accountNumber = 12345;

$account->deposit(200000);

$result = $account->withdraw(2000);

var_dump($result);

echo "The bank account $account->accountNumber has a balance of $account->balance";
