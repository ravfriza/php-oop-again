<?php

// SUMMARY
// PHP constructor is a special method that is called automatically when an object is created.
// Do use constructor promotion as much as possible to make the code shorter.

// Example: BankAccount with constructor examples

// Classic constructor (traditional way)
// class BankAccount
// {
//     private $accountNumber;
//     private $balance;

//     function __construct($accountNumber, $balance)
//     {
//         $this->accountNumber = $accountNumber;
//         $this->balance = $balance;
//     }

// }

// Constructor promotion method (PHP 8+ shorthand)
class BankAccount
{
    // Promotes parameters to class properties automatically
    function __construct(private $accountNumber, private $balance, $type)
    {

    }
}