<?php

namespace Drupal\block\Plugin\migrate\process;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\migrate\MigrateExecutableInterface;
<<<<<<< HEAD
use Drupal\migrate\Plugin\migrate\process\StaticMap;
=======
use Drupal\migrate\ProcessPluginBase;
>>>>>>> github/master
use Drupal\migrate\Row;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @MigrateProcessPlugin(
 *   id = "block_region"
 * )
 */
<<<<<<< HEAD
class BlockRegion extends StaticMap implements ContainerFactoryPluginInterface {
=======
class BlockRegion extends ProcessPluginBase implements ContainerFactoryPluginInterface {
>>>>>>> github/master

  /**
   * List of regions, keyed by theme.
   *
   * @var array[]
   */
  protected $regions;

  /**
   * Constructs a BlockRegion plugin instance.
   *
   * @param array $configuration
   *   The plugin configuration.
   * @param string $plugin_id
   *   The plugin ID.
   * @param mixed $plugin_definition
   *   The plugin definition.
   * @param array $regions
   *   Array of region maps, keyed by theme.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, array $regions) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->regions = $regions;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    $regions = array();
    foreach ($container->get('theme_handler')->listInfo() as $key => $theme) {
      $regions[$key] = $theme->info['regions'];
    }
    return new static($configuration, $plugin_id, $plugin_definition, $regions);
  }

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    // Set the destination region, based on the source region and theme as well
    // as the current destination default theme.
<<<<<<< HEAD
    list($source_theme, $destination_theme, $region) = $value;
=======
    list($region, $source_theme, $destination_theme) = $value;
>>>>>>> github/master

    // Theme is the same on both source and destination, so ensure that the
    // region exists in the destination theme.
    if (strtolower($source_theme) == strtolower($destination_theme)) {
      if (isset($this->regions[$destination_theme][$region])) {
        return $region;
      }
    }

<<<<<<< HEAD
    // Fall back to static mapping.
    return parent::transform($value, $migrate_executable, $row, $destination_property);
=======
    // If the source and destination theme are different, try to use the
    // mappings defined in the configuration.
    $region_map = $this->configuration['region_map'];
    if (isset($region_map[$region])) {
      return $region_map[$region];
    }

    // Oh well, we tried. Put the block in the main content region.
    return 'content';
>>>>>>> github/master
  }

}
