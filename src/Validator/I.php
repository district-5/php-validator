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
 * I
 *
 * An interface for describing a minimum set of function that all validators should expose.
 *
 * @author Mark Morgan <mark.morgan@district5.co.uk>
 */
interface I
{

    /**
     * Checks whether a value is valid
     *
     * @param mixed $value The value to validate
     *            
     * @return bool True if the value is valid, false otherwise
     */
    public function isValid($value);
    
    /**
     * Gets a message indicating the last error that occurred
     */
    public function getLastErrorMessage();
}