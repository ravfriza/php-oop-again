<?php
// Why should you use PHP interfaces?

// The following are reasons for using interfaces:

//     By implementing an interface, the object’s caller needs to care only about the object’s interface, not implementations of the object’s methods. Therefore you can change the implementations without affecting the caller of the interface.
//     An interface allows unrelated classes to implement the same set of methods, regardless of their positions in the class inheritance hierarchy.
//     An interface enables you to model multiple inheritances because a class can implement more than one interface.

// SUMMARY
// PHP interface provides a contract for other classes to follow (or implement).

interface Logger
{
    public function log($data);
}

class FileLogger implements Logger
{
    private $handle;
    private $logFile;

    public function __construct($filename, $mode = 'a')
    {
        $this->logFile = $filename;
        $this->handle = fopen($filename, $mode);
    }

    public function log($message)
    {
        $message = date('F j, Y, g:i a') . ': ' . $message . "\n";
        fwrite($this->handle, $message);
    }

    public function __destruct()
    {
        if($this->handle)
        {
            fclose($this->handle);
        }
    }
    
}


class DatabaseLogger implements Logger{
    
    public function log($message)
    {
        return sprintf("Log %s to the database\n", $message);
    }
}


$logger = new FileLogger('./hello.txt');
$logger->log('apasih');

$loggers = [
    new FileLogger('./hello.txt'),
    new DatabaseLogger()
];

foreach($loggers as $logger) {
    echo $logger->log('apaan tuh');
}

