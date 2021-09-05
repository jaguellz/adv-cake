<?php
use PHPUnit\Framework\TestCase;
require 'index.php';

class ReverseTest extends TestCase
{
    private $reverser;

    protected function setUp() : void
    {
        $this->reverser = new Reverser();
    }

    protected function tearDown() : void
    {
        $this->reverser = NULL;
    }

    public function testRevert()
    {
        $result = $this->reverser->revertCharacters('Hello, World!');
        $this->assertEquals('Olleh, Dlrow!', $result);
    }
}