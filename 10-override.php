<?php

// SUMMARY
// Method overriding allows a child class to define a method that overrides (or replaces) the method already provided by its parent class.
// Use parent:: to call the overridden method in the overriding method.
// Use the final method when you don’t want a child class’s method to override a parent class’s method.

class BankAccount
{
    public function __construct(private $balance) {}

    public function getBalance()
    {
        return $this->balance;
    }

    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }
        return $this;
    }

    public function withdraw($amount)
    {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            return true;
        }
        return false;
    }
}

class CheckingAccount extends BankAccount
{
    private $minBalance;

    public function __construct($amount, $minBalance)
    {
        if ($amount > 0 && $amount >= $minBalance) {
            parent::__construct($amount);

            $this->minBalance = $minBalance;
        } else {
            throw new InvalidArgumentException('amount must be higher than zero and higher than the minimum balance');
        }
    }

    public function withdraw($amount)
    {
        $canWithdraw = $amount > 0 && $this->getBalance() - $amount > $this->minBalance;

        if($canWithdraw) {
            parent::withdraw($amount);

            return true;
        }
        return false;
    }
}

// $account = new CheckingAccount(100000, 1000);
// $withdrawing = $account->withdraw(98000);
// var_dump($withdrawing);

// FINAL method
class Robot
{
    // public final function greet()
    // {
    //     return 'Hello.';
    // }

    public function greet()
    {
        return 'Hello.';
    }
}

class Android extends Robot
{
    public function greet()
    {
        $greeting = parent::greet();
        return "$greeting from Android";
    }
}


$robot = new Robot();
$android = new Android();

echo $robot->greet();
echo $android->greet();

