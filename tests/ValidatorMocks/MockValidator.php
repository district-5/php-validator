<?php

namespace District5Tests\ValidatorMocks;

use District5\Validator\AbstractValidator;

class MockValidator extends AbstractValidator
{
    protected bool $isGood;

    protected array $errorMessages = [
        'error' => 'This is a generic error',
        'error1' => 'This is error 1',
        'error2' => 'This is error 2'
    ];

    public function __construct(bool $isGood = true, array $options = [])
    {
        $this->isGood = $isGood;

        parent::__construct($options);
    }

    public function isValid($value): bool
    {
        if (!$this->isGood) {
            if ($value === 'error1') {
                $this->setLastErrorMessage('error1');
            } elseif ($value === 'error2') {
                $this->setLastErrorMessage('error2');
            } else {
                $this->setLastErrorMessage('error');
            }
        }

        return $this->isGood;
    }
}
