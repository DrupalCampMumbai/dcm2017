<?php

namespace Drupal\block_content;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
<<<<<<< HEAD
use Drupal\Core\Entity\RevisionLogInterface;
=======
>>>>>>> github/master

/**
 * Provides an interface defining a custom block entity.
 */
<<<<<<< HEAD
interface BlockContentInterface extends ContentEntityInterface, EntityChangedInterface, RevisionLogInterface {
=======
interface BlockContentInterface extends ContentEntityInterface, EntityChangedInterface {
>>>>>>> github/master

  /**
   * Returns the block revision log message.
   *
   * @return string
   *   The revision log message.
<<<<<<< HEAD
   *
   * @deprecated in Drupal 8.2.0, will be removed before Drupal 9.0.0. Use
   *   \Drupal\Core\Entity\RevisionLogInterface::getRevisionLogMessage() instead.
=======
>>>>>>> github/master
   */
  public function getRevisionLog();

  /**
   * Sets the block description.
   *
   * @param string $info
   *   The block description.
   *
   * @return \Drupal\block_content\BlockContentInterface
   *   The class instance that this method is called on.
   */
  public function setInfo($info);

  /**
   * Sets the block revision log message.
   *
   * @param string $revision_log
   *   The revision log message.
   *
   * @return \Drupal\block_content\BlockContentInterface
   *   The class instance that this method is called on.
<<<<<<< HEAD
   *
   * @deprecated in Drupal 8.2.0, will be removed before Drupal 9.0.0. Use
   *   \Drupal\Core\Entity\RevisionLogInterface::setRevisionLogMessage() instead.
=======
>>>>>>> github/master
   */
  public function setRevisionLog($revision_log);

  /**
   * Sets the theme value.
   *
   * When creating a new block content block from the block library, the user is
   * redirected to the configure form for that block in the given theme. The
   * theme is stored against the block when the block content add form is shown.
   *
   * @param string $theme
   *   The theme name.
   *
   * @return \Drupal\block_content\BlockContentInterface
   *   The class instance that this method is called on.
   */
  public function setTheme($theme);

  /**
   * Gets the theme value.
   *
   * When creating a new block content block from the block library, the user is
   * redirected to the configure form for that block in the given theme. The
   * theme is stored against the block when the block content add form is shown.
   *
   * @return string
   *   The theme name.
   */
  public function getTheme();

  /**
   * Gets the configured instances of this custom block.
   *
   * @return array
   *   Array of Drupal\block\Core\Plugin\Entity\Block entities.
   */
  public function getInstances();

}
