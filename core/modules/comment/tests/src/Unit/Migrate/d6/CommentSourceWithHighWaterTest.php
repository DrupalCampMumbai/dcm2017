<?php

namespace Drupal\Tests\comment\Unit\Migrate\d6;

/**
 * Tests the Drupal 6 comment source w/ high water handling.
 *
 * @group comment
 */
class CommentSourceWithHighWaterTest extends CommentTestBase {

  const ORIGINAL_HIGH_WATER = 1382255613;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
<<<<<<< HEAD
    $this->migrationConfiguration['source']['high_water_property']['name'] = 'timestamp';
=======
    $this->migrationConfiguration['highWaterProperty']['field'] = 'timestamp';
>>>>>>> github/master
    array_shift($this->expectedResults);
    parent::setUp();
  }

}
