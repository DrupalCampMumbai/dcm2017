<?php

namespace Drupal\migrate\Event;

use Drupal\migrate\Plugin\MigrationInterface;
<<<<<<< HEAD
use Drupal\migrate\MigrateMessageInterface;
use Drupal\migrate\Row;
=======
use Drupal\migrate\Row;
use Symfony\Component\EventDispatcher\Event;
>>>>>>> github/master

/**
 * Wraps a pre-save event for event listeners.
 */
<<<<<<< HEAD
class MigratePreRowSaveEvent extends EventBase {
=======
class MigratePreRowSaveEvent extends Event {
>>>>>>> github/master

  /**
   * Row object.
   *
   * @var \Drupal\migrate\Row
   */
  protected $row;

  /**
<<<<<<< HEAD
=======
   * Migration entity.
   *
   * @var \Drupal\migrate\Plugin\MigrationInterface
   */
  protected $migration;

  /**
>>>>>>> github/master
   * Constructs a pre-save event object.
   *
   * @param \Drupal\migrate\Plugin\MigrationInterface $migration
   *   Migration entity.
<<<<<<< HEAD
   * @param \Drupal\migrate\MigrateMessageInterface $message
   *   The current migrate message service.
   * @param \Drupal\migrate\Row $row
   */
  public function __construct(MigrationInterface $migration, MigrateMessageInterface $message, Row $row) {
    parent::__construct($migration, $message);
=======
   */
  public function __construct(MigrationInterface $migration, Row $row) {
    $this->migration = $migration;
>>>>>>> github/master
    $this->row = $row;
  }

  /**
<<<<<<< HEAD
=======
   * Gets the migration entity.
   *
   * @return \Drupal\migrate\Plugin\MigrationInterface
   *   The migration entity being imported.
   */
  public function getMigration() {
    return $this->migration;
  }

  /**
>>>>>>> github/master
   * Gets the row object.
   *
   * @return \Drupal\migrate\Row
   *   The row object about to be imported.
   */
  public function getRow() {
    return $this->row;
  }

}
