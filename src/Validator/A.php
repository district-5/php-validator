<?php

/**
 * District5 - Validator
 *
 * @copyright District5
 *
 * @author District5
 * @link https://www.district5.co.uk
 *
 * @license This software and associated documentation (the "Software") may not be
 * used, copied, modified, distributed, published or licensed to any 3rd party
 * without the written permission of District5 or its author.
 *
 * The above copyright notice and this permission notice shall be included in
 * all licensed copies of the Software.
 */
namespace District5\Validate;

/**
 * A
 *
 * An abstract validator for common validator functionality
 *
 * @author Mark Morgan <mark.morgan@district5.co.uk>
 */
abstract class A implements I
{
	/**
	 * Error messages that can be displayed when validation fails
	 *
	 * @var array
	 */
	protected $_errorMessages = array();
	
	/**
	 * 
	 * @var string
	 */
	protected $_lastErrorMessageKey;
	
	/**
	 * Creates a new instance of A
	 *
	 * @param array $options
	 */
	public function __construct($options = array())
	{
		if (array_key_exists('error_messages', $options))
			$this->_errorMessages = $options['error_messages'];
	}
	
	/**
	 * (non-PHPdoc)
	 *
	 * @see \District5\Validate\I::getLastErrorMessage()
	 */
	public function getLastErrorMessage()
	{
		if (array_key_exists($this->_lastErrorMessageKey, $this->_errorMessages))
			return $this->_errorMessages[$this->_lastErrorMessageKey];
	
		return '';
	}
	
	/**
	 * Sets the message key of the last error to occur
	 *
	 * @param string $errorMessageKey
	 */
	protected function setLastErrorMessage($errorMessageKey)
	{
		$this->_lastErrorMessageKey = $errorMessageKey;
	}
}