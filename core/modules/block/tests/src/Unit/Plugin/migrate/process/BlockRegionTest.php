<?php

namespace Drupal\Tests\block\Unit\Plugin\migrate\process;

use Drupal\block\Plugin\migrate\process\BlockRegion;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\Row;
use Drupal\Tests\UnitTestCase;

/**
 * @coversDefaultClass \Drupal\block\Plugin\migrate\process\BlockRegion
 * @group block
 */
class BlockRegionTest extends UnitTestCase {

  /**
   * Transforms a value through the block_region plugin.
   *
   * @param array $value
   *   The value to transform.
<<<<<<< HEAD
   * @param \Drupal\migrate\Row|null $row
=======
   * @param \Drupal\migrate\Row|NULL $row
>>>>>>> github/master
   *   (optional) The mocked row.
   *
   * @return array|string
   *   The transformed value.
   */
  protected function transform(array $value, Row $row = NULL) {
    $executable = $this->prophesize(MigrateExecutableInterface::class)->reveal();
    if (empty($row)) {
      $row = $this->prophesize(Row::class)->reveal();
    }

<<<<<<< HEAD
    $configuration = [
      'map' => [
        'bartik' => [
          'bartik' => [
            'triptych_first' => 'triptych_first',
            'triptych_middle' => 'triptych_second',
            'triptych_last' => 'triptych_third',
          ],
        ],
      ],
      'default_value' => 'content',
    ];

    $plugin = new BlockRegion($configuration, 'block_region', [], $configuration['map']['bartik']['bartik']);
=======
    $regions = array(
      'bartik' => array(
        'triptych_first' => 'Triptych first',
        'triptych_second' => 'Triptych second',
        'triptych_third' => 'Triptych third',
      ),
    );
    $plugin = new BlockRegion(['region_map' => []], 'block_region', [], $regions);
>>>>>>> github/master
    return $plugin->transform($value, $executable, $row, 'foo');
  }

  /**
   * If the source and destination themes are identical, the region should only
   * be passed through if it actually exists in the destination theme.
   *
   * @covers ::transform
   */
  public function testTransformSameThemeRegionExists() {
<<<<<<< HEAD
    $this->assertSame('triptych_second', $this->transform(['bartik', 'bartik', 'triptych_middle']));
=======
    $this->assertSame('triptych_second', $this->transform(['triptych_second', 'bartik', 'bartik']));
>>>>>>> github/master
  }

  /**
   * If the source and destination themes are identical, the region should be
   * changed to 'content' if it doesn't exist in the destination theme.
   *
   * @covers ::transform
   */
  public function testTransformSameThemeRegionNotExists() {
<<<<<<< HEAD
    $this->assertSame('content', $this->transform(['bartik', 'bartik', 'footer']));
=======
    $this->assertSame('content', $this->transform(['footer', 'bartik', 'bartik']));
>>>>>>> github/master
  }

}
