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
    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Failed asserting condition
     */
    public function testAssertConditionFalse()
    {
        Tebru\assert(false);
    }

    public function testAssertConditionTrue()
    {
        $this->assertNull(Tebru\assert(true));
    }

    /**
     * @expectedException \OutOfRangeException
     * @expectedExceptionMessage My test message
     */
    public function testAssertConditionChangeException()
    {
        $array = [0];
        Tebru\assert(isset($array['key']), new \OutOfRangeException('My test message'));
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Failed asserting condition
     */
    public function testAssertThatConditionFalse()
    {
        Tebru\assertThat(false);
    }

    public function testAssertThatConditionTrue()
    {
        $this->assertNull(Tebru\assertThat(true));
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage My test message
     */
    public function testAssertThatConditionMessage()
    {
        Tebru\assertThat(false, 'My %s message', 'test');
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Failed asserting that "2" equals "1"
     */
    public function testAssertEqualFalse()
    {
        Tebru\assertEqual(1, 2);
    }

    public function testAssertEqualTrue()
    {
        $this->assertNull(Tebru\assertEqual(1, '1'));
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage My test message
     */
    public function testAssertEqualMessage()
    {
        Tebru\assertEqual(1, 2, 'My %s message', 'test');
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Failed asserting that "1" does not equal "1"
     */
    public function testAssertNotEqualFalse()
    {
        Tebru\assertNotEqual(1, '1');
    }

    public function testAssertNotEqualTrue()
    {
        $this->assertNull(Tebru\assertNotEqual(1, 2));
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage My test message
     */
    public function testAssertNotEqualMessage()
    {
        Tebru\assertNotEqual(1, '1', 'My %s message', 'test');
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Failed asserting that "1" is the same as "1"
     */
    public function testAssertSameFalse()
    {
        Tebru\assertSame(1, '1');
    }

    public function testAssertSameTrue()
    {
        $this->assertNull(Tebru\assertSame(1, 1));
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage My test message
     */
    public function testAssertSameMessage()
    {
        Tebru\assertSame(1, 2, 'My %s message', 'test');
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Failed asserting that "1" is not the same as "1"
     */
    public function testAssertNotSameFalse()
    {
        Tebru\assertNotSame(1, 1);
    }

    public function testAssertNotSameTrue()
    {
        $this->assertNull(Tebru\assertNotSame(1, '1'));
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage My test message
     */
    public function testAssertNotSameMessage()
    {
        Tebru\assertNotSame(1, 1, 'My %s message', 'test');
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Failed asserting true
     */
    public function testAssertTrueFalse()
    {
        Tebru\assertTrue(false);
    }

    public function testAssertTrueTrue()
    {
        $this->assertNull(Tebru\assertTrue(true));
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage My test message
     */
    public function testAssertTrueMessage()
    {
        Tebru\assertTrue(false, 'My %s message', 'test');
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Failed asserting false
     */
    public function testAssertFalseFalse()
    {
        Tebru\assertFalse(true);
    }

    public function testAssertFalseTrue()
    {
        $this->assertNull(Tebru\assertFalse(false));
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage My test message
     */
    public function testAssertFalseMessage()
    {
        Tebru\assertFalse(true, 'My %s message', 'test');
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Failed asserting null
     */
    public function testAssertNullFalse()
    {
        Tebru\assertNull(1);
    }

    public function testAssertNullTrue()
    {
        $this->assertNull(Tebru\assertNull(null));
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage My test message
     */
    public function testAssertNullMessage()
    {
        Tebru\assertNull(1, 'My %s message', 'test');
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Failed asserting not null
     */
    public function testAssertNotNullFalse()
    {
        Tebru\assertNotNull(null);
    }

    public function testAssertNotNullTrue()
    {
        $this->assertNull(Tebru\assertNotNull(1));
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage My test message
     */
    public function testAssertNotNullMessage()
    {
        Tebru\assertNotNull(null, 'My %s message', 'test');
    }

    /**
     * @expectedException \OutOfBoundsException
     * @expectedExceptionMessage Failed asserting that key "1" exists in the array
     */
    public function testAssertArrayKeyExistsFalse()
    {
        $array[] = 'test';
        Tebru\assertArrayKeyExists(1, $array);
    }

    public function testAssertArrayKeyExistsTrue()
    {
        $array[] = 'test';
        $this->assertNull(Tebru\assertArrayKeyExists(0, $array));
    }

    /**
     * @expectedException \OutOfBoundsException
     * @expectedExceptionMessage My test message
     */
    public function testAssertArrayKeyExistsMessage()
    {
        $array[] = 'test';
        Tebru\assertArrayKeyExists(1, $array, 'My %s message', 'test');
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Failed asserting that key "0" does not exist in the array
     */
    public function testAssertArrayKeyNotExistsFalse()
    {
        $array[] = 'test';
        Tebru\assertArrayKeyNotExists(0, $array);
    }

    public function testAssertArrayKeyNotExistsTrue()
    {
        $array[] = 'test';
        $this->assertNull(Tebru\assertArrayKeyNotExists(1, $array));
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage My test message
     */
    public function testAssertArrayKeyNotExistsMessage()
    {
        $array[] = 'test';
        Tebru\assertArrayKeyNotExists(0, $array, 'My %s message', 'test');
    }

    /**
     * @expectedException \LengthException
     * @expectedExceptionMessage Failed asserting that "0" elements exist, found "1"
     */
    public function testAssertCountFalse()
    {
        $array[] = 'test';
        Tebru\assertCount(0, $array);
    }

    public function testAssertCountTrue()
    {
        $array[] = 'test';
        $this->assertNull(Tebru\assertCount(1, $array));
    }

    /**
     * @expectedException \LengthException
     * @expectedExceptionMessage My test message
     */
    public function testAssertCountMessage()
    {
        $array[] = 'test';
        Tebru\assertCount(0, $array, 'My %s message', 'test');
    }
}
