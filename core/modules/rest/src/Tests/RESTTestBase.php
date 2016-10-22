<?php

namespace Drupal\rest\Tests;

<<<<<<< HEAD
use Drupal\Core\Config\Entity\ConfigEntityType;
use Drupal\node\NodeInterface;
use Drupal\rest\RestResourceConfigInterface;
=======
use Drupal\node\NodeInterface;
>>>>>>> github/master
use Drupal\simpletest\WebTestBase;

/**
 * Test helper class that provides a REST client method to send HTTP requests.
 */
abstract class RESTTestBase extends WebTestBase {

  /**
<<<<<<< HEAD
   * The REST resource config storage.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  protected $resourceConfigStorage;

  /**
=======
>>>>>>> github/master
   * The default serialization format to use for testing REST operations.
   *
   * @var string
   */
  protected $defaultFormat;

  /**
   * The default MIME type to use for testing REST operations.
   *
   * @var string
   */
  protected $defaultMimeType;

  /**
   * The entity type to use for testing.
   *
   * @var string
   */
  protected $testEntityType = 'entity_test';

  /**
   * The default authentication provider to use for testing REST operations.
   *
   * @var array
   */
  protected $defaultAuth;


  /**
   * The raw response body from http request operations.
   *
   * @var array
   */
  protected $responseBody;

  /**
   * Modules to install.
   *
   * @var array
   */
<<<<<<< HEAD
  public static $modules = array('rest', 'entity_test');
=======
  public static $modules = array('rest', 'entity_test', 'node');
>>>>>>> github/master

  protected function setUp() {
    parent::setUp();
    $this->defaultFormat = 'hal_json';
    $this->defaultMimeType = 'application/hal+json';
    $this->defaultAuth = array('cookie');
<<<<<<< HEAD
    $this->resourceConfigStorage = $this->container->get('entity_type.manager')->getStorage('rest_resource_config');
    // Create a test content type for node testing.
    if (in_array('node', static::$modules)) {
      $this->drupalCreateContentType(array('name' => 'resttest', 'type' => 'resttest'));
    }
=======
    // Create a test content type for node testing.
    $this->drupalCreateContentType(array('name' => 'resttest', 'type' => 'resttest'));
>>>>>>> github/master
  }

  /**
   * Helper function to issue a HTTP request with simpletest's cURL.
   *
   * @param string|\Drupal\Core\Url $url
   *   A Url object or system path.
   * @param string $method
   *   HTTP method, one of GET, POST, PUT or DELETE.
   * @param string $body
   *   The body for POST and PUT.
   * @param string $mime_type
   *   The MIME type of the transmitted content.
<<<<<<< HEAD
   * @param bool $forget_xcsrf_token
   *   If TRUE, the CSRF token won't be included in request.
=======
>>>>>>> github/master
   *
   * @return string
   *   The content returned from the request.
   */
<<<<<<< HEAD
  protected function httpRequest($url, $method, $body = NULL, $mime_type = NULL, $forget_xcsrf_token = FALSE) {
=======
  protected function httpRequest($url, $method, $body = NULL, $mime_type = NULL) {
>>>>>>> github/master
    if (!isset($mime_type)) {
      $mime_type = $this->defaultMimeType;
    }
    if (!in_array($method, array('GET', 'HEAD', 'OPTIONS', 'TRACE'))) {
      // GET the CSRF token first for writing requests.
<<<<<<< HEAD
      $token = $this->drupalGet('session/token');
=======
      $token = $this->drupalGet('rest/session/token');
>>>>>>> github/master
    }

    $url = $this->buildUrl($url);

    $curl_options = array();
    switch ($method) {
      case 'GET':
        // Set query if there are additional GET parameters.
        $curl_options = array(
          CURLOPT_HTTPGET => TRUE,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_URL => $url,
          CURLOPT_NOBODY => FALSE,
          CURLOPT_HTTPHEADER => array('Accept: ' . $mime_type),
        );
        break;

<<<<<<< HEAD
      case 'HEAD':
        $curl_options = array(
          CURLOPT_HTTPGET => FALSE,
          CURLOPT_CUSTOMREQUEST => 'HEAD',
          CURLOPT_URL => $url,
          CURLOPT_NOBODY => TRUE,
          CURLOPT_HTTPHEADER => array('Accept: ' . $mime_type),
        );
        break;
=======
        case 'HEAD':
          $curl_options = array(
            CURLOPT_HTTPGET => FALSE,
            CURLOPT_CUSTOMREQUEST => 'HEAD',
            CURLOPT_URL => $url,
            CURLOPT_NOBODY => TRUE,
            CURLOPT_HTTPHEADER => array('Accept: ' . $mime_type),
          );
          break;
>>>>>>> github/master

      case 'POST':
        $curl_options = array(
          CURLOPT_HTTPGET => FALSE,
          CURLOPT_POST => TRUE,
          CURLOPT_POSTFIELDS => $body,
          CURLOPT_URL => $url,
          CURLOPT_NOBODY => FALSE,
<<<<<<< HEAD
          CURLOPT_HTTPHEADER => !$forget_xcsrf_token ? array(
            'Content-Type: ' . $mime_type,
            'X-CSRF-Token: ' . $token,
          ) : array(
            'Content-Type: ' . $mime_type,
=======
          CURLOPT_HTTPHEADER => array(
            'Content-Type: ' . $mime_type,
            'X-CSRF-Token: ' . $token,
>>>>>>> github/master
          ),
        );
        break;

      case 'PUT':
        $curl_options = array(
          CURLOPT_HTTPGET => FALSE,
          CURLOPT_CUSTOMREQUEST => 'PUT',
          CURLOPT_POSTFIELDS => $body,
          CURLOPT_URL => $url,
          CURLOPT_NOBODY => FALSE,
<<<<<<< HEAD
          CURLOPT_HTTPHEADER => !$forget_xcsrf_token ? array(
            'Content-Type: ' . $mime_type,
            'X-CSRF-Token: ' . $token,
          ) : array(
            'Content-Type: ' . $mime_type,
=======
          CURLOPT_HTTPHEADER => array(
            'Content-Type: ' . $mime_type,
            'X-CSRF-Token: ' . $token,
>>>>>>> github/master
          ),
        );
        break;

      case 'PATCH':
        $curl_options = array(
          CURLOPT_HTTPGET => FALSE,
          CURLOPT_CUSTOMREQUEST => 'PATCH',
          CURLOPT_POSTFIELDS => $body,
          CURLOPT_URL => $url,
          CURLOPT_NOBODY => FALSE,
<<<<<<< HEAD
          CURLOPT_HTTPHEADER => !$forget_xcsrf_token ? array(
            'Content-Type: ' . $mime_type,
            'X-CSRF-Token: ' . $token,
          ) : array(
            'Content-Type: ' . $mime_type,
=======
          CURLOPT_HTTPHEADER => array(
            'Content-Type: ' . $mime_type,
            'X-CSRF-Token: ' . $token,
>>>>>>> github/master
          ),
        );
        break;

      case 'DELETE':
        $curl_options = array(
          CURLOPT_HTTPGET => FALSE,
          CURLOPT_CUSTOMREQUEST => 'DELETE',
          CURLOPT_URL => $url,
          CURLOPT_NOBODY => FALSE,
<<<<<<< HEAD
          CURLOPT_HTTPHEADER => !$forget_xcsrf_token ? array('X-CSRF-Token: ' . $token) : array(),
=======
          CURLOPT_HTTPHEADER => array('X-CSRF-Token: ' . $token),
>>>>>>> github/master
        );
        break;
    }

<<<<<<< HEAD
    if ($mime_type === 'none') {
      unset($curl_options[CURLOPT_HTTPHEADER]['Content-Type']);
    }

=======
>>>>>>> github/master
    $this->responseBody = $this->curlExec($curl_options);

    // Ensure that any changes to variables in the other thread are picked up.
    $this->refreshVariables();

    $headers = $this->drupalGetHeaders();

    $this->verbose($method . ' request to: ' . $url .
      '<hr />Code: ' . curl_getinfo($this->curlHandle, CURLINFO_HTTP_CODE) .
      '<hr />Response headers: ' . nl2br(print_r($headers, TRUE)) .
      '<hr />Response body: ' . $this->responseBody);

    return $this->responseBody;
  }

  /**
   * Creates entity objects based on their types.
   *
   * @param string $entity_type
   *   The type of the entity that should be created.
   *
   * @return \Drupal\Core\Entity\EntityInterface
   *   The new entity object.
   */
  protected function entityCreate($entity_type) {
    return $this->container->get('entity_type.manager')
      ->getStorage($entity_type)
      ->create($this->entityValues($entity_type));
  }

  /**
   * Provides an array of suitable property values for an entity type.
   *
   * Required properties differ from entity type to entity type, so we keep a
   * minimum mapping here.
   *
<<<<<<< HEAD
   * @param string $entity_type_id
   *   The ID of the type of entity that should be created.
=======
   * @param string $entity_type
   *   The type of the entity that should be created.
>>>>>>> github/master
   *
   * @return array
   *   An array of values keyed by property name.
   */
<<<<<<< HEAD
  protected function entityValues($entity_type_id) {
    switch ($entity_type_id) {
=======
  protected function entityValues($entity_type) {
    switch ($entity_type) {
>>>>>>> github/master
      case 'entity_test':
        return array(
          'name' => $this->randomMachineName(),
          'user_id' => 1,
          'field_test_text' => array(0 => array(
            'value' => $this->randomString(),
            'format' => 'plain_text',
          )),
        );
<<<<<<< HEAD
      case 'config_test':
        return [
          'id' => $this->randomMachineName(),
          'label' => 'Test label',
        ];
=======
>>>>>>> github/master
      case 'node':
        return array('title' => $this->randomString(), 'type' => 'resttest');
      case 'node_type':
        return array(
          'type' => 'article',
          'name' => $this->randomMachineName(),
        );
      case 'user':
        return array('name' => $this->randomMachineName());

      case 'comment':
        return [
          'subject' => $this->randomMachineName(),
          'entity_type' => 'node',
          'comment_type' => 'comment',
          'comment_body' => $this->randomString(),
          'entity_id' => 'invalid',
          'field_name' => 'comment',
        ];
<<<<<<< HEAD
      case 'taxonomy_vocabulary':
        return [
          'vid' => 'tags',
          'name' => $this->randomMachineName(),
        ];
      default:
        if ($this->isConfigEntity($entity_type_id)) {
          return $this->configEntityValues($entity_type_id);
        }
=======

      default:
>>>>>>> github/master
        return array();
    }
  }

  /**
   * Enables the REST service interface for a specific entity type.
   *
<<<<<<< HEAD
   * @param string|false $resource_type
=======
   * @param string|FALSE $resource_type
>>>>>>> github/master
   *   The resource type that should get REST API enabled or FALSE to disable all
   *   resource types.
   * @param string $method
   *   The HTTP method to enable, e.g. GET, POST etc.
   * @param string|array $format
   *   (Optional) The serialization format, e.g. hal_json, or a list of formats.
   * @param array $auth
   *   (Optional) The list of valid authentication methods.
   */
<<<<<<< HEAD
  protected function enableService($resource_type, $method = 'GET', $format = NULL, array $auth = []) {
    if ($resource_type) {
      // Enable REST API for this entity type.
      $resource_config_id = str_replace(':', '.', $resource_type);
      // get entity by id
      /** @var \Drupal\rest\RestResourceConfigInterface $resource_config */
      $resource_config = $this->resourceConfigStorage->load($resource_config_id);
      if (!$resource_config) {
        $resource_config = $this->resourceConfigStorage->create([
          'id' => $resource_config_id,
          'granularity' => RestResourceConfigInterface::METHOD_GRANULARITY,
          'configuration' => []
        ]);
      }
      $configuration = $resource_config->get('configuration');

      if (is_array($format)) {
        for ($i = 0; $i < count($format); $i++) {
          $configuration[$method]['supported_formats'][] = $format[$i];
        }
=======
  protected function enableService($resource_type, $method = 'GET', $format = NULL, $auth = NULL) {
    // Enable REST API for this entity type.
    $config = $this->config('rest.settings');
    $settings = array();

    if ($resource_type) {
      if (is_array($format)) {
        $settings[$resource_type][$method]['supported_formats'] = $format;
>>>>>>> github/master
      }
      else {
        if ($format == NULL) {
          $format = $this->defaultFormat;
        }
<<<<<<< HEAD
        $configuration[$method]['supported_formats'][] = $format;
      }

      if (!is_array($auth) || empty($auth)) {
        $auth = $this->defaultAuth;
      }
      foreach ($auth as $auth_provider) {
        $configuration[$method]['supported_auth'][] = $auth_provider;
      }

      $resource_config->set('configuration', $configuration);
      $resource_config->save();
    }
    else {
      foreach ($this->resourceConfigStorage->loadMultiple() as $resource_config) {
        $resource_config->delete();
      }
    }
=======
        $settings[$resource_type][$method]['supported_formats'][] = $format;
      }

      if ($auth == NULL) {
        $auth = $this->defaultAuth;
      }
      $settings[$resource_type][$method]['supported_auth'] = $auth;
    }
    $config->set('resources', $settings);
    $config->save();
>>>>>>> github/master
    $this->rebuildCache();
  }

  /**
   * Rebuilds routing caches.
   */
  protected function rebuildCache() {
    // Rebuild routing cache, so that the REST API paths are available.
    $this->container->get('router.builder')->rebuild();
  }

  /**
   * {@inheritdoc}
   *
   * This method is overridden to deal with a cURL quirk: the usage of
   * CURLOPT_CUSTOMREQUEST cannot be unset on the cURL handle, so we need to
   * override it every time it is omitted.
   */
  protected function curlExec($curl_options, $redirect = FALSE) {
    if (!isset($curl_options[CURLOPT_CUSTOMREQUEST])) {
      if (!empty($curl_options[CURLOPT_HTTPGET])) {
        $curl_options[CURLOPT_CUSTOMREQUEST] = 'GET';
      }
      if (!empty($curl_options[CURLOPT_POST])) {
        $curl_options[CURLOPT_CUSTOMREQUEST] = 'POST';
      }
    }
    return parent::curlExec($curl_options, $redirect);
  }

  /**
   * Provides the necessary user permissions for entity operations.
   *
<<<<<<< HEAD
   * @param string $entity_type_id
=======
   * @param string $entity_type
>>>>>>> github/master
   *   The entity type.
   * @param string $operation
   *   The operation, one of 'view', 'create', 'update' or 'delete'.
   *
   * @return array
   *   The set of user permission strings.
   */
<<<<<<< HEAD
  protected function entityPermissions($entity_type_id, $operation) {
    switch ($entity_type_id) {
=======
  protected function entityPermissions($entity_type, $operation) {
    switch ($entity_type) {
>>>>>>> github/master
      case 'entity_test':
        switch ($operation) {
          case 'view':
            return array('view test entity');
          case 'create':
          case 'update':
          case 'delete':
            return array('administer entity_test content');
        }
      case 'node':
        switch ($operation) {
          case 'view':
            return array('access content');
          case 'create':
            return array('create resttest content');
          case 'update':
            return array('edit any resttest content');
          case 'delete':
            return array('delete any resttest content');
        }

      case 'comment':
        switch ($operation) {
          case 'view':
            return ['access comments'];

          case 'create':
            return ['post comments', 'skip comment approval'];

          case 'update':
            return ['edit own comments'];

          case 'delete':
            return ['administer comments'];
        }
        break;

      case 'user':
        switch ($operation) {
          case 'view':
            return ['access user profiles'];

          default:
            return ['administer users'];
<<<<<<< HEAD
        }

      default:
        if ($this->isConfigEntity($entity_type_id)) {
          $entity_type = \Drupal::entityTypeManager()->getDefinition($entity_type_id);
          if ($admin_permission = $entity_type->getAdminPermission()) {
            return [$admin_permission];
          }
        }
    }
    return [];
=======

        }
    }
>>>>>>> github/master
  }

  /**
   * Loads an entity based on the location URL returned in the location header.
   *
   * @param string $location_url
   *   The URL returned in the Location header.
   *
<<<<<<< HEAD
   * @return \Drupal\Core\Entity\Entity|false
=======
   * @return \Drupal\Core\Entity\Entity|FALSE.
>>>>>>> github/master
   *   The entity or FALSE if there is no matching entity.
   */
  protected function loadEntityFromLocationHeader($location_url) {
    $url_parts = explode('/', $location_url);
    $id = end($url_parts);
<<<<<<< HEAD
    return $this->container->get('entity_type.manager')
      ->getStorage($this->testEntityType)->load($id);
=======
    return entity_load($this->testEntityType, $id);
>>>>>>> github/master
  }

  /**
   * Remove node fields that can only be written by an admin user.
   *
   * @param \Drupal\node\NodeInterface $node
   *   The node to remove fields where non-administrative users cannot write.
   *
   * @return \Drupal\node\NodeInterface
   *   The node with removed fields.
   */
  protected function removeNodeFieldsForNonAdminUsers(NodeInterface $node) {
    $node->set('status', NULL);
    $node->set('created', NULL);
    $node->set('changed', NULL);
    $node->set('promote', NULL);
    $node->set('sticky', NULL);
    $node->set('revision_timestamp', NULL);
    $node->set('revision_log', NULL);
    $node->set('uid', NULL);

    return $node;
  }

  /**
   * Check to see if the HTTP request response body is identical to the expected
   * value.
   *
   * @param $expected
   *   The first value to check.
   * @param $message
   *   (optional) A message to display with the assertion. Do not translate
   *   messages: use \Drupal\Component\Utility\SafeMarkup::format() to embed
   *   variables in the message text, not t(). If left blank, a default message
   *   will be displayed.
   * @param $group
   *   (optional) The group this message is in, which is displayed in a column
   *   in test output. Use 'Debug' to indicate this is debugging output. Do not
   *   translate this string. Defaults to 'Other'; most tests do not override
   *   this default.
   *
   * @return bool
   *   TRUE if the assertion succeeded, FALSE otherwise.
   */
  protected function assertResponseBody($expected, $message = '', $group = 'REST Response') {
    return $this->assertIdentical($expected, $this->responseBody, $message ? $message : strtr('Response body @expected (expected) is equal to @response (actual).', array('@expected' => var_export($expected, TRUE), '@response' => var_export($this->responseBody, TRUE))), $group);
  }

<<<<<<< HEAD
  /**
   * Checks if an entity type id is for a Config Entity.
   *
   * @param string $entity_type_id
   *   The entity type ID to check.
   *
   * @return bool
   *   TRUE if the entity is a Config Entity, FALSE otherwise.
   */
  protected function isConfigEntity($entity_type_id) {
    return \Drupal::entityTypeManager()->getDefinition($entity_type_id) instanceof ConfigEntityType;
  }

  /**
   * Provides an array of suitable property values for a config entity type.
   *
   * Config entities have some common keys that need to be created. Required
   * properties differ among config entity types, so we keep a minimum mapping
   * here.
   *
   * @param string $entity_type_id
   *   The ID of the type of entity that should be created.
   *
   * @return array
   *   An array of values keyed by property name.
   */
  protected function configEntityValues($entity_type_id) {
    $entity_type = \Drupal::entityTypeManager()->getDefinition($entity_type_id);
    $keys = $entity_type->getKeys();
    $values = [];
    // Fill out known key values that are shared across entity types.
    foreach ($keys as $key) {
      if ($key === 'id' || $key === 'label') {
        $values[$key] = $this->randomMachineName();
      }
    }
    // Add extra values for particular entity types.
    switch ($entity_type_id) {
      case 'block':
        $values['plugin'] = 'system_powered_by_block';
        break;
    }
    return $values;
  }

=======
>>>>>>> github/master
}
