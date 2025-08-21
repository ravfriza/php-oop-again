<?php

// SUMMARY
// PHP $this keyword references the current object of the class. It’s only available within the class.
// Do use the method chaining by returning $this from a method to make the code more concise.

class BankAccount
{
    public $accountNumber;
    public $balance;

    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }
        return $this;
    }

    public function withdraw($amount)
    {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
            return $this;
        }
        return false;
    }
}

$account = new BankAccount();

$account->accountNumber = 123123321;
$account->balance = 100;

$account->withdraw(100)
        ->deposit(200);

echo "Your account balance is $account->balance";


