[![Build Status](https://travis-ci.org/tebru/assert.svg?branch=master)](https://travis-ci.org/tebru/assert)

# Assert
This is a simple library that contains a function to asset conditions.

## Installation

```
composer require tebru/assert:~0.1
```

## Usage
You must pass a condition as the first argument.  The second argument is an optional error message.  The third argument is an optional exception type to throw.  The default exception thrown is a `\LogicException`.

```
<?php

namespace Foo;

use Tebru;

Tebru\assert(false);
Tebru\assert(1 == 2);
Tebru\assert(false, 'My custom error message');
Tebru\assert(false, null, \InvalidArgumentException::class);
```

Starting with php 5.6, you can import functions

```
<?php

namespace Foo;

use function Tebru\assert;

assert(false);
```
