<?php

// SUMMARY
// Typed properties include modifiers (private, protected, and public) and types (except void and callable).
// Typed properties have uninitialized states, not null like untyped properties.

class BankAccount
{
    public function __construct(public float $balance = 0)
    {
        
    }
}

$account = new BankAccount(20);
// echo $account->balance;

unset($account->balance);
echo $account->balance;
