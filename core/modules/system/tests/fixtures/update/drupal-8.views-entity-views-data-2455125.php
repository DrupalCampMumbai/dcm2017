<?php

/**
 * @file
 * Contains database additions to drupal-8.bare.standard.php.gz for testing the
 * upgrade path of https://www.drupal.org/node/2455125.
 */

<<<<<<< HEAD
use Drupal\Core\Database\Database;
use Drupal\Core\Serialization\Yaml;
=======
use Drupal\Component\Serialization\Yaml;
use Drupal\Core\Database\Database;
>>>>>>> github/master

$connection = Database::getConnection();

// Structure of a view with timestamp fields.
$views_configs = [];

$views_configs[] = Yaml::decode(file_get_contents(__DIR__ . '/drupal-8.views-entity-views-data-2455125.yml'));

foreach ($views_configs as $views_config) {
<<<<<<< HEAD
  $connection->insert('config')
    ->fields(array(
=======
$connection->insert('config')
  ->fields(array(
>>>>>>> github/master
      'collection',
      'name',
      'data',
    ))
<<<<<<< HEAD
    ->values(array(
=======
  ->values(array(
>>>>>>> github/master
      'collection' => '',
      'name' => 'views.view.' . $views_config['id'],
      'data' => serialize($views_config),
    ))
<<<<<<< HEAD
    ->execute();
=======
  ->execute();
>>>>>>> github/master
}
