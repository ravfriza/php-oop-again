<?php

// SUMMARY
// Use the __destruct() to define a destructor for a class.
// PHP automatically invokes the destructor when the object is deleted or the script is terminated.

declare(strict_types=1);

class File
{
    private $handle;

    public function __construct(private string $filename, private string $mode = 'r')
    {
        $this->handle = fopen($this->filename, $this->mode);
        if ($this->handle === false) {
            throw new Exception("Unable to open file: {$this->filename}");
        }
    }

    public function __destruct()
    {
        $this->close();
    }

    public function close(): void
    {
        if (is_resource($this->handle)) {
            fclose($this->handle);
        }
    }

    public function read(): string
    {
        if (strpbrk($this->mode, 'r+') === false) {
            throw new Exception('File not opened in readable mode.');
        }
        rewind($this->handle);
        $contents = stream_get_contents($this->handle);
        return $contents === false ? '' : $contents;
    }

    public function write(string $text): int
    {
        if (strpbrk($this->mode, 'waxc+') === false) {
            throw new Exception('File not opened in writable mode.');
        }
        if (!flock($this->handle, LOCK_EX)) {
            throw new Exception('Could not acquire lock.');
        }
        $bytesWritten = fwrite($this->handle, $text);
        fflush($this->handle);
        flock($this->handle, LOCK_UN);
        if ($bytesWritten === false) {
            throw new Exception('Write failed.');
        }
        return $bytesWritten;
    }
}

$f = new File('./hello.txt', 'w');
$f->write('kentutssapih');
