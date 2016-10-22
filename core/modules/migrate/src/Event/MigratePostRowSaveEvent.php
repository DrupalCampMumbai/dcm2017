<?php

namespace Drupal\migrate\Event;

use Drupal\migrate\Plugin\MigrationInterface;
<<<<<<< HEAD
use Drupal\migrate\MigrateMessageInterface;
=======
>>>>>>> github/master
use Drupal\migrate\Row;

/**
 * Wraps a post-save event for event listeners.
 */
class MigratePostRowSaveEvent extends MigratePreRowSaveEvent {

  /**
<<<<<<< HEAD
   * The row's destination ID.
   *
   * @var array|bool
   */
  protected $destinationIdValues = [];

  /**
=======
>>>>>>> github/master
   * Constructs a post-save event object.
   *
   * @param \Drupal\migrate\Plugin\MigrationInterface $migration
   *   Migration entity.
<<<<<<< HEAD
   * @param \Drupal\migrate\MigrateMessageInterface $message
   *   The message interface.
=======
>>>>>>> github/master
   * @param \Drupal\migrate\Row $row
   *   Row object.
   * @param array|bool $destination_id_values
   *   Values represent the destination ID.
   */
<<<<<<< HEAD
  public function __construct(MigrationInterface $migration, MigrateMessageInterface $message, Row $row, $destination_id_values) {
    parent::__construct($migration, $message, $row);
=======
  public function __construct(MigrationInterface $migration, Row $row, $destination_id_values) {
    parent::__construct($migration, $row);
>>>>>>> github/master
    $this->destinationIdValues = $destination_id_values;
  }

  /**
   * Gets the destination ID values.
   *
   * @return array
   *   The destination ID as an array.
   */
  public function getDestinationIdValues() {
    return $this->destinationIdValues;
  }

}
