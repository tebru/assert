<?php
/**
 * File AssertTest.php 
 */

namespace Tebru\Test;

use PHPUnit_Framework_TestCase;
use Tebru;

/**
 * Class AssertTest
 *
 * @author Nate Brunette <n@tebru.net>
 */
class AssertTest extends PHPUnit_Framework_TestCase
{
    public function testAssertTrue()
    {
        Tebru\assert(true);
    }

    /**
     * @expectedException \LogicException
     */
    public function testAssertFalse()
    {
        Tebru\assert(false);
    }

    /**
     * @expectedException \OutOfRangeException
     */
    public function testChangeException()
    {
        $array = [0];
        Tebru\assert(isset($array['key']), new \OutOfRangeException());
    }
}
