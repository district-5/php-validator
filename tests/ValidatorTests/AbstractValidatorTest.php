<?php

namespace District5Tests\ValidatorTests;

use District5Tests\ValidatorMocks\MockValidator;
use PHPUnit\Framework\TestCase;

class AbstractValidatorTest extends TestCase
{
    public function testValid()
    {
        $validator = new MockValidator(true);

        $this->assertTrue($validator->isValid('anything'));
    }

    public function testNotOverridingErrorMessageKeys()
    {
        $validator = new MockValidator(false);

        $this->assertFalse($validator->isValid('error1'));
        $this->assertEquals('error1', $validator->getLastErrorMessageKey());
    }

    public function testOverridingErrorMessageKeysThrowingNonOverriddenKey()
    {
        $validator = new MockValidator(false, ['errorMessages' => ['error1' => 'New error1']]);

        $this->assertFalse($validator->isValid('error2'));
        $this->assertEquals('This is error 2', $validator->getLastErrorMessage());
    }

    public function testOverridingErrorMessageKeysThrowingOverriddenKey()
    {
        $validator = new MockValidator(false, ['errorMessages' => ['error1' => 'New error1']]);

        $this->assertFalse($validator->isValid('error1'));
        $this->assertEquals('New error1', $validator->getLastErrorMessage());
    }
}
