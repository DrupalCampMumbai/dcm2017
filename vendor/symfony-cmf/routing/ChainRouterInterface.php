<?php

/*
 * This file is part of the Symfony CMF package.
 *
<<<<<<< HEAD
 * (c) 2011-2015 Symfony CMF
=======
 * (c) 2011-2014 Symfony CMF
>>>>>>> github/master
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Cmf\Component\Routing;

use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Routing\Matcher\RequestMatcherInterface;

/**
 * Interface for a router that proxies routing to other routers.
 *
 * @author Daniel Wehner <dawehner@googlemail.com>
 */
interface ChainRouterInterface extends RouterInterface, RequestMatcherInterface
{
    /**
     * Add a Router to the index.
     *
     * @param RouterInterface $router   The router instance. Instead of RouterInterface, may also
     *                                  be RequestMatcherInterface and UrlGeneratorInterface.
<<<<<<< HEAD
     * @param int             $priority The priority
=======
     * @param integer         $priority The priority
>>>>>>> github/master
     */
    public function add($router, $priority = 0);

    /**
     * Sorts the routers and flattens them.
     *
     * @return RouterInterface[] or RequestMatcherInterface and UrlGeneratorInterface.
     */
    public function all();
}
