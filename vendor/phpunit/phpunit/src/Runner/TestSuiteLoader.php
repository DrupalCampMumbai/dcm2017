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
 * An interface to define how a test suite should be loaded.
 *
 * @since      Interface available since Release 2.0.0
 */
interface PHPUnit_Runner_TestSuiteLoader
{
    /**
<<<<<<< HEAD
     * @param string $suiteClassName
     * @param string $suiteClassFile
     *
=======
     * @param  string          $suiteClassName
     * @param  string          $suiteClassFile
>>>>>>> github/master
     * @return ReflectionClass
     */
    public function load($suiteClassName, $suiteClassFile = '');

    /**
<<<<<<< HEAD
     * @param ReflectionClass $aClass
     *
=======
     * @param  ReflectionClass $aClass
>>>>>>> github/master
     * @return ReflectionClass
     */
    public function reload(ReflectionClass $aClass);
}
