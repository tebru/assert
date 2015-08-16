[![Build Status](https://travis-ci.org/tebru/assert.svg?branch=master)](https://travis-ci.org/tebru/assert)
[![Coverage Status](https://coveralls.io/repos/tebru/assert/badge.svg?branch=master&service=github)](https://coveralls.io/github/tebru/assert?branch=master)

# Assert
This is a simple library that contains a function to asset conditions.

## Installation

```
composer require tebru/assert:~0.1
```

## Usage
You must pass a condition as the first argument.  The second argument is an optional custom exception to throw instead of \LogicException and the default message.

```
<?php

namespace Foo;

use Tebru;

Tebru\assert(false);
Tebru\assert(1 == 2);
Tebru\assert(false, new \InvalidArgumentException('My custom error message'));
```

Starting with php 5.6, you can import functions

```
<?php

namespace Foo;

use function Tebru\assert;

assert(false);
```
