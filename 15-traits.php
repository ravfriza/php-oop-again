<?php

// SUMMARY


trait Logger
{
    public function log($msg)
    {
        echo '<pre>';
        echo date('Y-m-d h:i:s') . ':' . '(' . __CLASS__ . ') ' . $msg . '<br/>';
        echo '</pre>';
    }
}

class BankAccount
{
    use Logger;

    public function __construct(private $accountNumber)
    {
        $this->log("A new $accountNumber bank account created");
    }
}

class User
{
    use Logger;

    public function __construct()
    {
        $this->log('A new user created');
    }
}

// $bankAccount = new BankAccount(123123);
// $user = new User();

// echo $bankAccount;
// echo $user;


// Multiple Traits

trait Preprocessor
{
    public function preprocess()
    {
        echo 'Preprocess...done' . '<br/>';
    }
}

trait Compiler
{
    public function compile()
    {
        echo 'Compile code...done' . '<br/>';
    }
}

trait Assembler
{
    public function createObjCode()
    {
        echo 'Create the object code files...done' . '<br/>';
    }
}

trait Linker
{
    public function createExec()
    {
        echo 'Create the executable file...done' . '<br/>';
    }
}

class IDE
{
    use Preprocessor, Compiler, Assembler, Linker;

    public function run()
    {
        $this->preprocess();
        $this->compile();
        $this->createObjCode();
        $this->createExec();

        echo 'Execute the file...done' . '<br/>';
    }
}


// $ide = new IDE();
// echo $ide->run();

// Composing Multiple Traits

trait Reader
{
    public function read($source)
    {
        echo sprintf('Read from %s <br>' . $source);
    }
}

trait Writer
{
    public function write($destination)
    {
        echo sprintf('Write to %s <br>' . $destination);
    }
}

trait Copier
{
    use Reader, Writer;

    public function copy($source, $destination)
    {
        $this->read($source);
        $this->write($destination);
    }
}

class FileUtil
{
    use Copier;

    public function copyFile($source, $destination)
    {
        $this->copy($source, $destination);
    }
}


// Trait Conflict Method Resolution

trait FileLogger
{
    public function log($msg)
    {
        echo 'File Logger ' . date('Y-m-d h:i:s') . ':' . $msg . '<br/>';
    }
}

trait DatabaseLogger
{
    public function log($msg)
    {
        echo 'Database Logger ' . date('Y-m-d h:i:s') . ':' . $msg . '<br/>';
    }
}

class Logger2
{
    use FileLogger, DatabaseLogger{
        // Solve trait method name conflict using alias
        DatabaseLogger::log as logToDatabase;
        FileLogger::log insteadof DatabaseLogger;
    }
}

$logger = new Logger2();
// $logger->log("test 1");
$logger->logToDatabase("test 2");


