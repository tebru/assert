<?php
/**
 * File assert.php
 */

namespace Tebru;

/**
 * Assert a condition
 *
 * Optionally pass in a failure message and exception to throw on failures
 *
 * @param bool $condition
 * @param string $failureMessage
 * @param string $exception
 */
function assert($condition, $failureMessage = null, $exception = '\LogicException')
{
    if (!$condition) {
        if (null === $failureMessage) {
            $failureMessage = 'Failed to assert condition';
        }

        throw new $exception($failureMessage);
    }
}
