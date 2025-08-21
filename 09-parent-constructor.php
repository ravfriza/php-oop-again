<?php

// SUMMARY
// The constructor of the child class doesn’t automatically call the constructor of its parent class.
// Use parent::__construct(arguments) to call the parent constructor from the constructor in the child class.

class BankAccount
{
    public function __construct(private $balance)
    {
    }

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

    public function __construct($balance, $interestRate)
    {
        parent::__construct($balance);

        $this->interestRate = $interestRate;
    }

    public function addInterest()
    {
        $interest = $this->interestRate * $this->getBalance();
        $this->deposit($interest);
    }
}

$account = new SavingAccount(200, 0.5);
$account->addInterest();
echo $account->getBalance();
