<?php

// SUMMARY
// An abstract class cannot be instantiated. It provides an interface for other classes to extend.
// An abstract method doesn’t have an implementation. If a class contains one or more abstract methods, it must be an abstract class.
// A class that extends an abstract class needs to implement the abstract methods of the abstract class.

abstract class Dumper
{
    abstract public function dump($data);
}

class WebDumper extends Dumper
{
    public function dump($data)
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
    }
}

class ConsoleDumper extends Dumper
{
    public function dump($data)
    {
        var_dump($data);
    }
}

// $webDump = new WebDumper();
// $webDump->dump('hello world bro!');

class DumperFactory
{
    public static function getDumper()
    {
        return PHP_SAPI === 'cli' ? new ConsoleDumper() : new WebDumper();
    }
}

$dumper = DumperFactory::getDumper();
$dumper->dump('PHP is Awesome!');
