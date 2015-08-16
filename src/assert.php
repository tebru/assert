<?php
/**
 * File return assert.php
 */

namespace Tebru;

use Exception;
use LogicException;
use OutOfBoundsException;

/**
 * Assert a condition
 *
 * Optionally pass in an exception to throw on failures
 *
 * @param bool $condition
 * @param Exception $exception
 * @return null
 */
function assert($condition, Exception $exception = null)
{
    if ($condition) {
        return null;
    }

    if (null === $exception) {
        $exception = new LogicException('Failed asserting condition');
    }

    throw $exception;
}

/**
 * Simple assertion that allows changing the message
 *
 * Throws a LogicException on failure
 *
 * @param $condition
 * @param null $message
 * @param null $_
 */
function assertThat($condition, $message = null, $_ = null)
{
    $printArguments = array_slice(func_get_args(), 2);

    if (null === $message) {
        $message = 'Failed asserting condition';
    }

    assert($condition, new LogicException(vsprintf($message, $printArguments)));
}

/**
 * Assert two values are equal
 *
 * @param $expected
 * @param $actual
 * @param null $message
 * @param null $_
 * @return null
 */
function assertEqual($expected, $actual, $message = null, $_ = null)
{
    $printArguments = array_slice(func_get_args(), 3);

    if (null === $message) {
        $message = 'Failed asserting that "%s" equals "%s"';
        $printArguments = [$actual, $expected];
    }

    return assert($expected == $actual, new LogicException(vsprintf($message, $printArguments)));
}

/**
 * Assert two values are not equal
 *
 * @param $expected
 * @param $actual
 * @param null $message
 * @param null $_
 * @return null
 */
function assertNotEqual($expected, $actual, $message = null, $_ = null)
{
    $printArguments = array_slice(func_get_args(), 3);

    if (null === $message) {
        $message = 'Failed asserting that "%s" does not equal "%s"';
        $printArguments = [$actual, $expected];
    }

    return assert($expected != $actual, new LogicException(vsprintf($message, $printArguments)));
}

/**
 * Assert two values are the same
 *
 * @param $expected
 * @param $actual
 * @param null $message
 * @param null $_
 * @return null
 */
function assertSame($expected, $actual, $message = null, $_ = null)
{
    $printArguments = array_slice(func_get_args(), 3);

    if (null === $message) {
        $message = 'Failed asserting that "%s" is the same as "%s"';
        $printArguments = [$actual, $expected];
    }

    return assert($expected === $actual, new LogicException(vsprintf($message, $printArguments)));
}

/**
 * Assert two values are not the same
 *
 * @param $expected
 * @param $actual
 * @param null $message
 * @param null $_
 * @return null
 */
function assertNotSame($expected, $actual, $message = null, $_ = null)
{
    $printArguments = array_slice(func_get_args(), 3);

    if (null === $message) {
        $message = 'Failed asserting that "%s" is not the same as "%s"';
        $printArguments = [$actual, $expected];
    }

    return assert($expected !== $actual, new LogicException(vsprintf($message, $printArguments)));
}

/**
 * Assert value is true
 *
 * @param $value
 * @param null $message
 * @param null $_
 * @return null
 */
function assertTrue($value, $message = null, $_ = null)
{
    $printArguments = array_slice(func_get_args(), 2);

    if (null === $message) {
        $message = 'Failed asserting true';
    }

    return assert(true === $value, new LogicException(vsprintf($message, $printArguments)));
}

/**
 * Assert value is false
 *
 * @param $value
 * @param null $message
 * @param null $_
 * @return null
 */
function assertFalse($value, $message = null, $_ = null)
{
    $printArguments = array_slice(func_get_args(), 2);

    if (null === $message) {
        $message = 'Failed asserting false';
    }

    return assert(false === $value, new LogicException(vsprintf($message, $printArguments)));
}

/**
 * Assert value is null
 *
 * @param $value
 * @param null $message
 * @param null $_
 * @return null
 */
function assertNull($value, $message = null, $_ = null)
{
    $printArguments = array_slice(func_get_args(), 2);

    if (null === $message) {
        $message = 'Failed asserting null';
    }

    return assert(null === $value, new LogicException(vsprintf($message, $printArguments)));
}

/**
 * Assert value is not null
 *
 * @param $value
 * @param null $message
 * @param null $_
 * @return null
 */
function assertNotNull($value, $message = null, $_ = null)
{
    $printArguments = array_slice(func_get_args(), 2);

    if (null === $message) {
        $message = 'Failed asserting not null';
    }

    return assert(null !== $value, new LogicException(vsprintf($message, $printArguments)));
}

/**
 * Assert that the key exists in the array
 *
 * @param $key
 * @param array $search
 * @param null $message
 * @param null $_
 * @return null
 */
function assertArrayKeyExists($key, array $search, $message = null, $_ = null)
{
    $printArguments = array_slice(func_get_args(), 3);

    if (null === $message) {
        $message = 'Failed asserting that key "%s" exists in the array';
        $printArguments = [$key];
    }

    return assert(array_key_exists($key, $search), new OutOfBoundsException(vsprintf($message, $printArguments)));
}

/**
 * Assert that a key does not exist in array
 * @param $key
 * @param array $search
 * @param null $message
 * @param null $_
 * @return null
 */
function assertArrayKeyNotExists($key, array $search, $message = null, $_ = null)
{
    $printArguments = array_slice(func_get_args(), 3);

    if (null === $message) {
        $message = 'Failed asserting that key "%s" does not exist in the array';
        $printArguments = [$key];
    }

    return assert(!array_key_exists($key, $search), new LogicException(vsprintf($message, $printArguments)));
}

/**
 * Assert correct number of elements
 *
 * @param $expected
 * @param $countable
 * @param null $message
 * @param null $_
 * @return null
 */
function assertCount($expected, $countable, $message = null, $_ = null)
{
    $printArguments = array_slice(func_get_args(), 3);

    $numElements = count($countable);
    if (null === $message) {
        $message = 'Failed asserting that "%d" elements exist, found "%d"';
        $printArguments = [$expected, $numElements];
    }

    return assert($expected === $numElements, new \LengthException(vsprintf($message, $printArguments)));
}
