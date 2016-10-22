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
 * This class defines the current version of PHPUnit.
 *
 * @since Class available since Release 2.0.0
 */
class PHPUnit_Runner_Version
{
    private static $pharVersion;
    private static $version;

    /**
     * Returns the current version of PHPUnit.
     *
     * @return string
     */
    public static function id()
    {
        if (self::$pharVersion !== null) {
            return self::$pharVersion;
        }

        if (self::$version === null) {
<<<<<<< HEAD
            $version       = new SebastianBergmann\Version('4.8.27', dirname(dirname(__DIR__)));
=======
            $version       = new SebastianBergmann\Version('4.8.11', dirname(dirname(__DIR__)));
>>>>>>> github/master
            self::$version = $version->getVersion();
        }

        return self::$version;
    }

    /**
     * @return string
<<<<<<< HEAD
     *
     * @since Method available since Release 4.8.13
     */
    public static function series()
    {
        if (strpos(self::id(), '-')) {
            $tmp     = explode('-', self::id());
            $version = $tmp[0];
        } else {
            $version = self::id();
        }

        return implode('.', array_slice(explode('.', $version), 0, 2));
    }

    /**
     * @return string
=======
>>>>>>> github/master
     */
    public static function getVersionString()
    {
        return 'PHPUnit ' . self::id() . ' by Sebastian Bergmann and contributors.';
    }

    /**
     * @return string
<<<<<<< HEAD
     *
=======
>>>>>>> github/master
     * @since  Method available since Release 4.0.0
     */
    public static function getReleaseChannel()
    {
<<<<<<< HEAD
        if (strpos(self::$pharVersion, '-') !== false) {
            return '-nightly';
=======
        if (strpos(self::$pharVersion, 'alpha') !== false) {
            return '-alpha';
        }

        if (strpos(self::$pharVersion, 'beta') !== false) {
            return '-beta';
>>>>>>> github/master
        }

        return '';
    }
}
