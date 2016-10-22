<?php

namespace Drupal\rest\Routing;

<<<<<<< HEAD
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Routing\RouteSubscriberBase;
use Drupal\rest\Plugin\Type\ResourcePluginManager;
use Drupal\rest\RestResourceConfigInterface;
=======
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Routing\RouteSubscriberBase;
use Drupal\rest\Plugin\Type\ResourcePluginManager;
>>>>>>> github/master
use Psr\Log\LoggerInterface;
use Symfony\Component\Routing\RouteCollection;

/**
 * Subscriber for REST-style routes.
 */
class ResourceRoutes extends RouteSubscriberBase {

  /**
   * The plugin manager for REST plugins.
   *
   * @var \Drupal\rest\Plugin\Type\ResourcePluginManager
   */
  protected $manager;

  /**
<<<<<<< HEAD
   * The REST resource config storage.
   *
   * @var \Drupal\Core\Entity\EntityManagerInterface
   */
  protected $resourceConfigStorage;
=======
   * The Drupal configuration factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $config;
>>>>>>> github/master

  /**
   * A logger instance.
   *
   * @var \Psr\Log\LoggerInterface
   */
  protected $logger;

  /**
   * Constructs a RouteSubscriber object.
   *
   * @param \Drupal\rest\Plugin\Type\ResourcePluginManager $manager
   *   The resource plugin manager.
<<<<<<< HEAD
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager
   * @param \Psr\Log\LoggerInterface $logger
   *   A logger instance.
   */
  public function __construct(ResourcePluginManager $manager, EntityTypeManagerInterface $entity_type_manager, LoggerInterface $logger) {
    $this->manager = $manager;
    $this->resourceConfigStorage = $entity_type_manager->getStorage('rest_resource_config');
=======
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config
   *   The configuration factory holding resource settings.
   * @param \Psr\Log\LoggerInterface $logger
   *   A logger instance.
   */
  public function __construct(ResourcePluginManager $manager, ConfigFactoryInterface $config, LoggerInterface $logger) {
    $this->manager = $manager;
    $this->config = $config;
>>>>>>> github/master
    $this->logger = $logger;
  }

  /**
   * Alters existing routes for a specific collection.
   *
   * @param \Symfony\Component\Routing\RouteCollection $collection
   *   The route collection for adding routes.
   * @return array
   */
  protected function alterRoutes(RouteCollection $collection) {
<<<<<<< HEAD
    // Iterate over all enabled REST resource configs.
    /** @var \Drupal\rest\RestResourceConfigInterface[] $resource_configs */
    $resource_configs = $this->resourceConfigStorage->loadMultiple();
    // Iterate over all enabled resource plugins.
    foreach ($resource_configs as $resource_config) {
      $resource_routes = $this->getRoutesForResourceConfig($resource_config);
      $collection->addCollection($resource_routes);
    }
  }

  /**
   * Provides all routes for a given REST resource config.
   *
   * This method determines where a resource is reachable, what path
   * replacements are used, the required HTTP method for the operation etc.
   *
   * @param \Drupal\rest\RestResourceConfigInterface $rest_resource_config
   *   The rest resource config.
   *
   * @return \Symfony\Component\Routing\RouteCollection
   *   The route collection.
   */
  protected function getRoutesForResourceConfig(RestResourceConfigInterface $rest_resource_config) {
    $plugin = $rest_resource_config->getResourcePlugin();
    $collection = new RouteCollection();

    foreach ($plugin->routes() as $name => $route) {
      /** @var \Symfony\Component\Routing\Route $route */
      // @todo: Are multiple methods possible here?
      $methods = $route->getMethods();
      // Only expose routes where the method is enabled in the configuration.
      if ($methods && ($method = $methods[0]) && $supported_formats = $rest_resource_config->getFormats($method)) {
        $route->setRequirement('_csrf_request_header_token', 'TRUE');

        // Check that authentication providers are defined.
        if (empty($rest_resource_config->getAuthenticationProviders($method))) {
          $this->logger->error('At least one authentication provider must be defined for resource @id', array(':id' => $rest_resource_config->id()));
          continue;
        }

        // Check that formats are defined.
        if (empty($rest_resource_config->getFormats($method))) {
          $this->logger->error('At least one format must be defined for resource @id', array(':id' => $rest_resource_config->id()));
          continue;
        }

        // If the route has a format requirement, then verify that the
        // resource has it.
        $format_requirement = $route->getRequirement('_format');
        if ($format_requirement && !in_array($format_requirement, $rest_resource_config->getFormats($method))) {
          continue;
        }

        // The configuration seems legit at this point, so we set the
        // authentication provider and add the route.
        $route->setOption('_auth', $rest_resource_config->getAuthenticationProviders($method));
        $route->setDefault('_rest_resource_config', $rest_resource_config->id());
        $collection->add("rest.$name", $route);
      }

    }
    return $collection;
=======
    $routes = array();

    // Silently ignore resources that are in the settings but are not defined on
    // the plugin manager currently. That avoids exceptions when REST module is
    // enabled before another module that provides the resource plugin specified
    // in the settings.
    // @todo Remove in https://www.drupal.org/node/2308745
    $resources = $this->config->get('rest.settings')->get('resources') ?: array();
    $enabled_resources = array_intersect_key($resources, $this->manager->getDefinitions());
    if (count($resources) != count($enabled_resources)) {
      trigger_error('rest.settings lists resources relying on the following missing plugins: ' . implode(', ', array_keys(array_diff_key($resources, $enabled_resources))));
    }

    // Iterate over all enabled resource plugins.
    foreach ($enabled_resources as $id => $enabled_methods) {
      $plugin = $this->manager->getInstance(array('id' => $id));

      foreach ($plugin->routes() as $name => $route) {
        // @todo: Are multiple methods possible here?
        $methods = $route->getMethods();
        // Only expose routes where the method is enabled in the configuration.
        if ($methods && ($method = $methods[0]) && $method && isset($enabled_methods[$method])) {
          $route->setRequirement('_access_rest_csrf', 'TRUE');

          // Check that authentication providers are defined.
          if (empty($enabled_methods[$method]['supported_auth']) || !is_array($enabled_methods[$method]['supported_auth'])) {
            $this->logger->error('At least one authentication provider must be defined for resource @id', array(':id' => $id));
            continue;
          }

          // Check that formats are defined.
          if (empty($enabled_methods[$method]['supported_formats']) || !is_array($enabled_methods[$method]['supported_formats'])) {
            $this->logger->error('At least one format must be defined for resource @id', array(':id' => $id));
            continue;
          }

          // If the route has a format requirement, then verify that the
          // resource has it.
          $format_requirement = $route->getRequirement('_format');
          if ($format_requirement && !in_array($format_requirement, $enabled_methods[$method]['supported_formats'])) {
            continue;
          }

          // The configuration seems legit at this point, so we set the
          // authentication provider and add the route.
          $route->setOption('_auth', $enabled_methods[$method]['supported_auth']);
          $routes["rest.$name"] = $route;
          $collection->add("rest.$name", $route);
        }
      }
    }
>>>>>>> github/master
  }

}
