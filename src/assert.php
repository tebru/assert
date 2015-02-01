<?php
/**
 * File assert.php
 */

namespace Tebru;

use Exception;
use LogicException;

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
        $exception = new LogicException('Failed to assert condition');
    }

    throw $exception;
}
