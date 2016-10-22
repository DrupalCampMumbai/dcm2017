<?php

namespace Drupal\early_rendering_controller_test;

use Drupal\Core\Cache\CacheableDependencyInterface;
<<<<<<< HEAD
use Drupal\Core\Cache\UncacheableDependencyTrait;

class CacheableTestDomainObject extends TestDomainObject implements CacheableDependencyInterface {

  use UncacheableDependencyTrait;
=======

class CacheableTestDomainObject extends TestDomainObject implements CacheableDependencyInterface {

  /**
   * {@inheritdoc}
   */
  public function getCacheContexts() {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheTags() {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
    return 0;
  }
>>>>>>> github/master

}
