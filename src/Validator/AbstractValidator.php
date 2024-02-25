<?php

/**
 * District5 Validator Library
 *
 * @author      District5 <hello@district5.co.uk>
 * @copyright   District5 <hello@district5.co.uk>
 * @link        https://www.district5.co.uk
 *
 * MIT LICENSE
 *
 *  Permission is hereby granted, free of charge, to any person obtaining
 *  a copy of this software and associated documentation files (the
 *  "Software"), to deal in the Software without restriction, including
 *  without limitation the rights to use, copy, modify, merge, publish,
 *  distribute, sublicense, and/or sell copies of the Software, and to
 *  permit persons to whom the Software is furnished to do so, subject to
 *  the following conditions:
 *
 *  The above copyright notice and this permission notice shall be
 *  included in all copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 *  EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 *  MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 *  NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 *  LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 *  OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 *  WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
namespace District5\Validator;

/**
 * AbstractValidator
 *
 * An abstract validator for common validator functionality.
 */
abstract class AbstractValidator implements ValidatorInterface
{
	/**
	 * Error messages that can be displayed when validation fails.
	 *
	 * @var array
	 */
	protected $errorMessages;
	
	/**
	 * The key of the last error message to display.
     *
	 * @var string
	 */
	protected $lastErrorMessageKey;
	
	/**
	 * Creates a new instance of A
	 *
	 * @param array $options
	 */
	public function __construct(array $options = [])
	{
        $this->errorMessages = isset($options['errorMessages']) ?? [];
	}
	
	/**
	 * (non-PHPdoc)
	 *
	 * @see \District5\Validator\ValidatorInterface::getLastErrorMessage()
	 */
	public function getLastErrorMessage(): ?string
	{
        return isset($this->errorMessages[$this->lastErrorMessageKey]) ?? null;
	}
	
	/**
	 * Sets the message key of the last error to occur.
	 *
	 * @param string $errorMessageKey
	 */
	protected function setLastErrorMessage(string $errorMessageKey)
	{
		$this->lastErrorMessageKey = $errorMessageKey;
	}
}
