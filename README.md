# District5 Validator Library

## About
This library provides the skeletons to support validators.

## Installing
This library requires no other libraries.

```
composer require district5/validator
```

## Usage
### Validator
To create an implementation of a validator you will need to implement the `\District5\Validator\ValidatorInterface` interface or extend the provided Abstract Class `\District5\Validator\AbstractValidator`.

An example validator for a StringLength validator might look as follows:
```php

use \District5\Validator\AbstractValidator;

class StringLengthValidator extends AbstractValidator
{
    protected $errorMessages = [
        'notString' => 'Value is not a string',
        'tooShort' => 'Value is below the minimum string length',
        'tooLong' => 'Value exceeds the maximum string length'
    ];

    private $min;

    private $max;

    public function __construct(int $min, int $max)
    {
        parent::__construct();

        $this->min = $min;
        $this->max = $max;
    }

    public function isValid($value): bool
    {
        if (!is_string($value)) {
            $this->setLastErrorMessage('notString');
            return false;
        }

        $len = strlen($value);

        if ($len > $this->max) {
            $this->setLastErrorMessage('tooLong');
            return false;
        }

        if ($len < $this->min) {
            $this->setLastErrorMessage('tooShort');
            return false;
        }

        return true;
    }
} 
```

## Issues
Log a bug report!