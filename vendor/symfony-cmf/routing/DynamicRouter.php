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

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
<<<<<<< HEAD
use Symfony\Component\Routing\Route;
=======
>>>>>>> github/master
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Matcher\RequestMatcherInterface;
use Symfony\Component\Routing\Matcher\UrlMatcherInterface;
use Symfony\Component\Routing\RequestContextAwareInterface;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Cmf\Component\Routing\Enhancer\RouteEnhancerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Cmf\Component\Routing\Event\Events;
use Symfony\Cmf\Component\Routing\Event\RouterMatchEvent;
<<<<<<< HEAD
use Symfony\Cmf\Component\Routing\Event\RouterGenerateEvent;
=======
>>>>>>> github/master

/**
 * A flexible router accepting matcher and generator through injection and
 * using the RouteEnhancer concept to generate additional data on the routes.
 *
 * @author Larry Garfield
 * @author David Buchmann
 */
class DynamicRouter implements RouterInterface, RequestMatcherInterface, ChainedRouterInterface
{
    /**
     * @var RequestMatcherInterface|UrlMatcherInterface
     */
    protected $matcher;

    /**
     * @var UrlGeneratorInterface
     */
    protected $generator;

    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * @var RouteEnhancerInterface[]
     */
    protected $enhancers = array();

    /**
<<<<<<< HEAD
     * Cached sorted list of enhancers.
=======
     * Cached sorted list of enhancers
>>>>>>> github/master
     *
     * @var RouteEnhancerInterface[]
     */
    protected $sortedEnhancers = array();

    /**
<<<<<<< HEAD
     * The regexp pattern that needs to be matched before a dynamic lookup is
     * made.
=======
     * The regexp pattern that needs to be matched before a dynamic lookup is made
>>>>>>> github/master
     *
     * @var string
     */
    protected $uriFilterRegexp;

    /**
     * @var RequestContext
     */
    protected $context;

    /**
     * @var RouteCollection
     */
    private $routeCollection;

    /**
     * @param RequestContext                              $context
     * @param RequestMatcherInterface|UrlMatcherInterface $matcher
     * @param UrlGeneratorInterface                       $generator
     * @param string                                      $uriFilterRegexp
     * @param EventDispatcherInterface|null               $eventDispatcher
     * @param RouteProviderInterface                      $provider
     */
    public function __construct(RequestContext $context,
                                $matcher,
                                UrlGeneratorInterface $generator,
                                $uriFilterRegexp = '',
                                EventDispatcherInterface $eventDispatcher = null,
                                RouteProviderInterface $provider = null
    ) {
        $this->context = $context;
<<<<<<< HEAD
        if (!$matcher instanceof RequestMatcherInterface && !$matcher instanceof UrlMatcherInterface) {
=======
        if (! $matcher instanceof RequestMatcherInterface && ! $matcher instanceof UrlMatcherInterface) {
>>>>>>> github/master
            throw new \InvalidArgumentException('Matcher must implement either Symfony\Component\Routing\Matcher\RequestMatcherInterface or Symfony\Component\Routing\Matcher\UrlMatcherInterface');
        }
        $this->matcher = $matcher;
        $this->generator = $generator;
        $this->eventDispatcher = $eventDispatcher;
        $this->uriFilterRegexp = $uriFilterRegexp;
        $this->provider = $provider;

        $this->generator->setContext($context);
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * {@inheritDoc}
>>>>>>> github/master
     */
    public function getRouteCollection()
    {
        if (!$this->routeCollection instanceof RouteCollection) {
            $this->routeCollection = $this->provider
                ? new LazyRouteCollection($this->provider) : new RouteCollection();
        }

        return $this->routeCollection;
    }

    /**
     * @return RequestMatcherInterface|UrlMatcherInterface
     */
    public function getMatcher()
    {
        /* we may not set the context in DynamicRouter::setContext as this
         * would lead to symfony cache warmup problems.
         * a request matcher does not need the request context separately as it
         * can get it from the request.
         */
        if ($this->matcher instanceof RequestContextAwareInterface) {
            $this->matcher->setContext($this->getContext());
        }

        return $this->matcher;
    }

    /**
     * @return UrlGeneratorInterface
     */
    public function getGenerator()
    {
        $this->generator->setContext($this->getContext());

        return $this->generator;
    }

    /**
     * Generates a URL from the given parameters.
     *
     * If the generator is not able to generate the url, it must throw the
     * RouteNotFoundException as documented below.
     *
<<<<<<< HEAD
     * @param string|Route $name          The name of the route or the Route instance
     * @param mixed        $parameters    An array of parameters
     * @param bool|string  $referenceType The type of reference to be generated (one of the constants in UrlGeneratorInterface)
=======
     * @param string  $name       The name of the route
     * @param mixed   $parameters An array of parameters
     * @param Boolean $absolute   Whether to generate an absolute URL
>>>>>>> github/master
     *
     * @return string The generated URL
     *
     * @throws RouteNotFoundException if route doesn't exist
     *
     * @api
     */
<<<<<<< HEAD
    public function generate($name, $parameters = array(), $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH)
    {
        if ($this->eventDispatcher) {
            $event = new RouterGenerateEvent($name, $parameters, $referenceType);
            $this->eventDispatcher->dispatch(Events::PRE_DYNAMIC_GENERATE, $event);
            $name = $event->getRoute();
            $parameters = $event->getParameters();
            $referenceType = $event->getReferenceType();
        }

        return $this->getGenerator()->generate($name, $parameters, $referenceType);
    }

    /**
     * Delegate to our generator.
     *
     * {@inheritdoc}
=======
    public function generate($name, $parameters = array(), $absolute = false)
    {
        return $this->getGenerator()->generate($name, $parameters, $absolute);
    }

    /**
     * Delegate to our generator
     *
     * {@inheritDoc}
>>>>>>> github/master
     */
    public function supports($name)
    {
        if ($this->generator instanceof VersatileGeneratorInterface) {
            return $this->generator->supports($name);
        }

        return is_string($name);
    }

    /**
     * Tries to match a URL path with a set of routes.
     *
     * If the matcher can not find information, it must throw one of the
     * exceptions documented below.
     *
     * @param string $pathinfo The path info to be parsed (raw format, i.e. not
     *                         urldecoded)
     *
     * @return array An array of parameters
     *
     * @throws ResourceNotFoundException If the resource could not be found
     * @throws MethodNotAllowedException If the resource was found but the
     *                                   request method is not allowed
     *
     * @deprecated Use matchRequest exclusively to avoid problems. This method will be removed in version 2.0
<<<<<<< HEAD
     *
=======
>>>>>>> github/master
     * @api
     */
    public function match($pathinfo)
    {
<<<<<<< HEAD
        @trigger_error(__METHOD__.'() is deprecated since version 1.3 and will be removed in 2.0. Use matchRequest() instead.', E_USER_DEPRECATED);

=======
>>>>>>> github/master
        $request = Request::create($pathinfo);
        if ($this->eventDispatcher) {
            $event = new RouterMatchEvent();
            $this->eventDispatcher->dispatch(Events::PRE_DYNAMIC_MATCH, $event);
        }

<<<<<<< HEAD
        if (!empty($this->uriFilterRegexp) && !preg_match($this->uriFilterRegexp, $pathinfo)) {
=======
        if (! empty($this->uriFilterRegexp) && ! preg_match($this->uriFilterRegexp, $pathinfo)) {
>>>>>>> github/master
            throw new ResourceNotFoundException("$pathinfo does not match the '{$this->uriFilterRegexp}' pattern");
        }

        $matcher = $this->getMatcher();
<<<<<<< HEAD
        if (!$matcher instanceof UrlMatcherInterface) {
=======
        if (! $matcher instanceof UrlMatcherInterface) {
>>>>>>> github/master
            throw new \InvalidArgumentException('Wrong matcher type, you need to call matchRequest');
        }

        $defaults = $matcher->match($pathinfo);

        return $this->applyRouteEnhancers($defaults, $request);
    }

    /**
     * Tries to match a request with a set of routes and returns the array of
     * information for that route.
     *
     * If the matcher can not find information, it must throw one of the
     * exceptions documented below.
     *
     * @param Request $request The request to match
     *
     * @return array An array of parameters
     *
     * @throws ResourceNotFoundException If no matching resource could be found
     * @throws MethodNotAllowedException If a matching resource was found but
     *                                   the request method is not allowed
     */
    public function matchRequest(Request $request)
    {
        if ($this->eventDispatcher) {
            $event = new RouterMatchEvent($request);
            $this->eventDispatcher->dispatch(Events::PRE_DYNAMIC_MATCH_REQUEST, $event);
        }

<<<<<<< HEAD
        if (!empty($this->uriFilterRegexp)
            && !preg_match($this->uriFilterRegexp, $request->getPathInfo())
=======
        if (! empty($this->uriFilterRegexp)
            && ! preg_match($this->uriFilterRegexp, $request->getPathInfo())
>>>>>>> github/master
        ) {
            throw new ResourceNotFoundException("{$request->getPathInfo()} does not match the '{$this->uriFilterRegexp}' pattern");
        }

        $matcher = $this->getMatcher();
        if ($matcher instanceof UrlMatcherInterface) {
            $defaults = $matcher->match($request->getPathInfo());
        } else {
            $defaults = $matcher->matchRequest($request);
        }

        return $this->applyRouteEnhancers($defaults, $request);
    }

    /**
<<<<<<< HEAD
     * Apply the route enhancers to the defaults, according to priorities.
=======
     * Apply the route enhancers to the defaults, according to priorities
>>>>>>> github/master
     *
     * @param array   $defaults
     * @param Request $request
     *
     * @return array
     */
    protected function applyRouteEnhancers($defaults, Request $request)
    {
        foreach ($this->getRouteEnhancers() as $enhancer) {
            $defaults = $enhancer->enhance($defaults, $request);
        }

        return $defaults;
    }

    /**
     * Add route enhancers to the router to let them generate information on
     * matched routes.
     *
     * The order of the enhancers is determined by the priority, the higher the
     * value, the earlier the enhancer is run.
     *
     * @param RouteEnhancerInterface $enhancer
     * @param int                    $priority
     */
    public function addRouteEnhancer(RouteEnhancerInterface $enhancer, $priority = 0)
    {
        if (empty($this->enhancers[$priority])) {
            $this->enhancers[$priority] = array();
        }

        $this->enhancers[$priority][] = $enhancer;
        $this->sortedEnhancers = array();

        return $this;
    }

    /**
     * Sorts the enhancers and flattens them.
     *
     * @return RouteEnhancerInterface[] the enhancers ordered by priority
     */
    public function getRouteEnhancers()
    {
        if (empty($this->sortedEnhancers)) {
            $this->sortedEnhancers = $this->sortRouteEnhancers();
        }

        return $this->sortedEnhancers;
    }

    /**
     * Sort enhancers by priority.
     *
     * The highest priority number is the highest priority (reverse sorting).
     *
     * @return RouteEnhancerInterface[] the sorted enhancers
     */
    protected function sortRouteEnhancers()
    {
        $sortedEnhancers = array();
        krsort($this->enhancers);

        foreach ($this->enhancers as $enhancers) {
            $sortedEnhancers = array_merge($sortedEnhancers, $enhancers);
        }

        return $sortedEnhancers;
    }

    /**
     * Sets the request context.
     *
     * @param RequestContext $context The context
     *
     * @api
     */
    public function setContext(RequestContext $context)
    {
        $this->context = $context;
    }

    /**
     * Gets the request context.
     *
     * @return RequestContext The context
     *
     * @api
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * {@inheritDoc}
>>>>>>> github/master
     *
     * Forwards to the generator.
     */
    public function getRouteDebugMessage($name, array $parameters = array())
    {
        if ($this->generator instanceof VersatileGeneratorInterface) {
            return $this->generator->getRouteDebugMessage($name, $parameters);
        }

        return "Route '$name' not found";
    }
}
