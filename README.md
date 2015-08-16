[![Build Status](https://travis-ci.org/tebru/assert.svg?branch=master)](https://travis-ci.org/tebru/assert)
[![Coverage Status](https://coveralls.io/repos/tebru/assert/badge.svg?branch=master&service=github)](https://coveralls.io/github/tebru/assert?branch=master)

# Assert
This is a simple library that contains a function to asset conditions.

## Installation

```
composer require tebru/assert:~0.2
```

## Usage

Using the generic assert functions, you must pass a condition as the first argument.

### Simple

The easiest and most generic way to use this library is through `assertThat()`.  This will throw a `LogicException` with a default message that is easily customized.

```php
Tebru\assertThat(false);
Tebru\assertThat(1 === 2);
Tebru\assertThat(false, 'My %s %s', 'test', 'message');
```

### Changing exceptions

If you need to throw specific exceptions, that can be done through `assert()`.  The method defaults to throwing a `LogicException`.

```php
Tebru\assert(false);
Tebru\assert(1 === 2);
Tebru\assert(false, new \InvalidArgumentException('My custom error message'));
```

### Additional Funcitons

There are a number of additional functions that assert specific conditions.
Each one accepts a message and a variable number of arguments to be used with an sprintf function as the
final arguments. A list is provided below with the method definition:

* assertEqual($expected, $actual, $message = null, $_ = null)
* assertNotEqual($expected, $actual, $message = null, $_ = null)
* assertSame($expected, $actual, $message = null, $_ = null)
* assertNotSame($expected, $actual, $message = null, $_ = null)
* assertTrue($value, $message = null, $_ = null)
* assertFalse($value, $message = null, $_ = null)
* assertNull($value, $message = null, $_ = null)
* assertNotNull($value, $message = null, $_ = null)
* assertArrayKeyExists($key, array $search, $message = null, $_ = null)
* assertArrayKeyNotExists($key, array $search, $message = null, $_ = null)
* assertCount($expected, $countable, $message = null, $_ = null)

### Advanced Usage

Starting with php 5.6, you can import functions

```
<?php

namespace Foo;

use function Tebru\assert;

assert(false);
```
