<?php


namespace Fixures;
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    protected $stack;

    protected function setUp(): void
    {
        $this->stack = [];
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    public function testEmpty()
    {
        $this->assertTrue(empty($this->stack));
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    public function testPush()
    {
        array_push($this->stack, 'foo');
        $this->assertSame('foo', $this->stack[count($this->stack)-1]);
        $this->assertFalse(empty($this->stack));
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    public function testPop()
    {
        array_push($this->stack, 'foo');
        $this->assertSame('foo', array_pop($this->stack));
        $this->assertTrue(empty($this->stack));
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    public function tearDown(): void{
        fwrite(STDOUT, __METHOD__ . "\n");

    }
}