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
 * Constraint that accepts null.
 *
 * @since Class available since Release 3.3.0
 */
class PHPUnit_Framework_Constraint_IsNull extends PHPUnit_Framework_Constraint
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
        return $other === null;
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return 'is null';
    }
}
