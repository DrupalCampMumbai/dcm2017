<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Constraint that asserts that a string is valid JSON.
 *
 * @since Class available since Release 3.7.20
 */
class PHPUnit_Framework_Constraint_IsJson extends PHPUnit_Framework_Constraint
{
    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
<<<<<<< HEAD
     * @param mixed $other Value or object to evaluate.
     *
=======
     * @param  mixed $other Value or object to evaluate.
>>>>>>> github/master
     * @return bool
     */
    protected function matches($other)
    {
        json_decode($other);
        if (json_last_error()) {
            return false;
        }

        return true;
    }

    /**
     * Returns the description of the failure
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
     *
<<<<<<< HEAD
     * @param mixed $other Evaluated value or object.
     *
=======
     * @param  mixed  $other Evaluated value or object.
>>>>>>> github/master
     * @return string
     */
    protected function failureDescription($other)
    {
        json_decode($other);
        $error = PHPUnit_Framework_Constraint_JsonMatches_ErrorMessageProvider::determineJsonError(
            json_last_error()
        );

        return sprintf(
            '%s is valid JSON (%s)',
            $this->exporter->shortenedExport($other),
            $error
        );
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return 'is valid JSON';
    }
}
