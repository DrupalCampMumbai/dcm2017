<?php

namespace Drupal\views\Plugin\views\sort;

use Drupal\Core\Cache\CacheableDependencyInterface;
<<<<<<< HEAD
use Drupal\Core\Cache\UncacheableDependencyTrait;
=======
>>>>>>> github/master
use Drupal\Core\Form\FormStateInterface;

/**
 * Handle a random sort.
 *
 * @ViewsSort("random")
 */
class Random extends SortPluginBase implements CacheableDependencyInterface {

<<<<<<< HEAD
  use UncacheableDependencyTrait;

=======
>>>>>>> github/master
  /**
   * {@inheritdoc}
   */
  public function usesGroupBy() {
    return FALSE;
  }

  public function query() {
    $this->query->addOrderBy('rand');
  }

  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
    $form['order']['#access'] = FALSE;
  }

<<<<<<< HEAD
=======
  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
    return 0;
  }

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

>>>>>>> github/master
}
