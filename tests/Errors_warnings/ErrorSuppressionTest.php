<?php

namespace Errors_warnings;
use PHPUnit\Framework\TestCase;

class ErrorSuppressionTest extends TestCase
{
    //**
    //When testing code that uses PHP built-in functions such as fopen()
    // that may trigger errors it can sometimes be useful to use error suppression while testing.
    // This allows you to check the return values by suppressing notices that would lead to an exception
    // raised by PHPUnit’s error handler.
    //
    //Example 2.13 Testing return values of code that uses PHP Errors*/
    public function testFileWriting()
    {
        $writer = new FileWriter;

        $this->assertFalse(@$writer->write('/is-not-writeable/file', 'stuff'));
    }
}

class FileWriter
{
    public function write($file, $content)
    {
        $file = fopen($file, 'w');

        if ($file == false) {
            return false;
        }

    }
}