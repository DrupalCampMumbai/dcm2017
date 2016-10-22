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

use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Route as SymfonyRoute;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
<<<<<<< HEAD
use Psr\Log\LoggerInterface;

/**
 * A Generator that uses a RouteProvider rather than a RouteCollection.
=======

use Psr\Log\LoggerInterface;

/**
 * A Generator that uses a RouteProvider rather than a RouteCollection
>>>>>>> github/master
 *
 * @author Larry Garfield
 */
class ProviderBasedGenerator extends UrlGenerator implements VersatileGeneratorInterface
{
    /**
     * The route provider for this generator.
     *
     * @var RouteProviderInterface
     */
    protected $provider;

    /**
     * @param RouteProviderInterface $provider
     * @param LoggerInterface        $logger
     */
    public function __construct(RouteProviderInterface $provider, LoggerInterface $logger = null)
    {
        $this->provider = $provider;
        $this->logger = $logger;
        $this->context = new RequestContext();
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
     */
    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if ($name instanceof SymfonyRoute) {
            $route = $name;
        } elseif (null === $route = $this->provider->getRouteByName($name)) {
=======
     * {@inheritDoc}
     */
    public function generate($name, $parameters = array(), $absolute = false)
    {
        if ($name instanceof SymfonyRoute) {
            $route = $name;
        } elseif (null === $route = $this->provider->getRouteByName($name, $parameters)) {
>>>>>>> github/master
            throw new RouteNotFoundException(sprintf('Route "%s" does not exist.', $name));
        }

        // the Route has a cache of its own and is not recompiled as long as it does not get modified
        $compiledRoute = $route->compile();
        $hostTokens = $compiledRoute->getHostTokens();

        $debug_message = $this->getRouteDebugMessage($name);

<<<<<<< HEAD
        return $this->doGenerate($compiledRoute->getVariables(), $route->getDefaults(), $route->getRequirements(), $compiledRoute->getTokens(), $parameters, $debug_message, $referenceType, $hostTokens);
    }

    /**
     * Support a route object and any string as route name.
     *
     * {@inheritdoc}
=======
        return $this->doGenerate($compiledRoute->getVariables(), $route->getDefaults(), $route->getRequirements(), $compiledRoute->getTokens(), $parameters, $debug_message, $absolute, $hostTokens);
    }

    /**
     * Support a route object and any string as route name
     *
     * {@inheritDoc}
>>>>>>> github/master
     */
    public function supports($name)
    {
        return is_string($name) || $name instanceof SymfonyRoute;
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * {@inheritDoc}
>>>>>>> github/master
     */
    public function getRouteDebugMessage($name, array $parameters = array())
    {
        if (is_scalar($name)) {
            return $name;
        }

        if (is_array($name)) {
            return serialize($name);
        }

        if ($name instanceof RouteObjectInterface) {
<<<<<<< HEAD
            return 'Route with key '.$name->getRouteKey();
        }

        if ($name instanceof SymfonyRoute) {
            return 'Route with path '.$name->getPath();
=======
            return 'Route with key ' . $name->getRouteKey();
        }

        if ($name instanceof SymfonyRoute) {
            return 'Route with pattern ' . $name->getPattern();
>>>>>>> github/master
        }

        return get_class($name);
    }
<<<<<<< HEAD
=======

>>>>>>> github/master
}
