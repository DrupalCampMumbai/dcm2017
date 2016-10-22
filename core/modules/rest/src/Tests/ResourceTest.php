<?php

namespace Drupal\rest\Tests;

<<<<<<< HEAD
use Drupal\Core\Session\AccountInterface;
use Drupal\rest\RestResourceConfigInterface;
use Drupal\user\Entity\Role;
use Drupal\user\RoleInterface;
=======
use Drupal\Component\Plugin\Exception\PluginNotFoundException;
use Drupal\Core\Session\AccountInterface;
use Drupal\user\Entity\Role;
>>>>>>> github/master

/**
 * Tests the structure of a REST resource.
 *
 * @group rest
 */
class ResourceTest extends RESTTestBase {

  /**
   * Modules to install.
   *
   * @var array
   */
<<<<<<< HEAD
  public static $modules = array('hal', 'rest', 'entity_test', 'rest_test');
=======
  public static $modules = array('hal', 'rest', 'entity_test');
>>>>>>> github/master

  /**
   * The entity.
   *
   * @var \Drupal\Core\Entity\EntityInterface
   */
  protected $entity;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
<<<<<<< HEAD
    // Create an entity programmatic.
=======
    $this->config = $this->config('rest.settings');

    // Create an entity programmatically.
>>>>>>> github/master
    $this->entity = $this->entityCreate('entity_test');
    $this->entity->save();

    Role::load(AccountInterface::ANONYMOUS_ROLE)
      ->grantPermission('view test entity')
      ->save();
  }

  /**
   * Tests that a resource without formats cannot be enabled.
   */
  public function testFormats() {
<<<<<<< HEAD
    $this->resourceConfigStorage->create([
      'id' => 'entity.entity_test',
      'granularity' => RestResourceConfigInterface::METHOD_GRANULARITY,
      'configuration' => [
        'GET' => [
          'supported_auth' => [
            'basic_auth',
          ],
        ],
      ],
    ])->save();
=======
    $settings = array(
      'entity:entity_test' => array(
        'GET' => array(
          'supported_auth' => array(
            'basic_auth',
          ),
        ),
      ),
    );

    // Attempt to enable the resource.
    $this->config->set('resources', $settings);
    $this->config->save();
    $this->rebuildCache();
>>>>>>> github/master

    // Verify that accessing the resource returns 406.
    $response = $this->httpRequest($this->entity->urlInfo()->setRouteParameter('_format', $this->defaultFormat), 'GET');
    // \Drupal\Core\Routing\RequestFormatRouteFilter considers the canonical,
    // non-REST route a match, but a lower quality one: no format restrictions
    // means there's always a match and hence when there is no matching REST
    // route, the non-REST route is used, but can't render into
    // application/hal+json, so it returns a 406.
    $this->assertResponse('406', 'HTTP response code is 406 when the resource does not define formats, because it falls back to the canonical, non-REST route.');
    $this->curlClose();
  }

  /**
   * Tests that a resource without authentication cannot be enabled.
   */
  public function testAuthentication() {
<<<<<<< HEAD
    $this->resourceConfigStorage->create([
      'id' => 'entity.entity_test',
      'granularity' => RestResourceConfigInterface::METHOD_GRANULARITY,
      'configuration' => [
        'GET' => [
          'supported_formats' => [
            'hal_json',
          ],
        ],
      ],
    ])->save();
=======
    $settings = array(
      'entity:entity_test' => array(
        'GET' => array(
          'supported_formats' => array(
            'hal_json',
          ),
        ),
      ),
    );

    // Attempt to enable the resource.
    $this->config->set('resources', $settings);
    $this->config->save();
    $this->rebuildCache();
>>>>>>> github/master

    // Verify that accessing the resource returns 401.
    $response = $this->httpRequest($this->entity->urlInfo()->setRouteParameter('_format', $this->defaultFormat), 'GET');
    // \Drupal\Core\Routing\RequestFormatRouteFilter considers the canonical,
    // non-REST route a match, but a lower quality one: no format restrictions
    // means there's always a match and hence when there is no matching REST
    // route, the non-REST route is used, but can't render into
    // application/hal+json, so it returns a 406.
    $this->assertResponse('406', 'HTTP response code is 406 when the resource does not define formats, because it falls back to the canonical, non-REST route.');
    $this->curlClose();
  }

  /**
<<<<<<< HEAD
   * Tests that serialization_class is optional.
   */
  public function testSerializationClassIsOptional() {
    $this->enableService('serialization_test', 'POST', 'json');

    Role::load(RoleInterface::ANONYMOUS_ID)
      ->grantPermission('restful post serialization_test')
      ->save();

    $serialized = $this->container->get('serializer')->serialize(['foo', 'bar'], 'json');
    $this->httpRequest('serialization_test', 'POST', $serialized, 'application/json');
    $this->assertResponse(200);
    $this->assertResponseBody('["foo","bar"]');
  }

  /**
=======
>>>>>>> github/master
   * Tests that resource URI paths are formatted properly.
   */
  public function testUriPaths() {
    $this->enableService('entity:entity_test');
    /** @var \Drupal\rest\Plugin\Type\ResourcePluginManager $manager */
    $manager = \Drupal::service('plugin.manager.rest');

    foreach ($manager->getDefinitions() as $resource => $definition) {
      foreach ($definition['uri_paths'] as $key => $uri_path) {
        $this->assertFalse(strpos($uri_path, '//'), 'The resource URI path does not have duplicate slashes.');
      }
    }
  }

<<<<<<< HEAD
=======
  /**
   * Tests that a resource with a missing plugin does not cause an exception.
   */
  public function testMissingPlugin() {
    $settings = array(
      'entity:nonexisting' => array(
        'GET' => array(
          'supported_formats' => array(
            'hal_json',
          ),
        ),
      ),
    );

    try {
      // Attempt to enable the resource.
      $this->config->set('resources', $settings);
      $this->config->save();
      $this->rebuildCache();
      $this->pass('rest.settings referencing a missing REST resource plugin does not cause an exception.');
    }
    catch (PluginNotFoundException $e) {
      $this->fail('rest.settings referencing a missing REST resource plugin caused an exception.');
    }
  }

>>>>>>> github/master
}
