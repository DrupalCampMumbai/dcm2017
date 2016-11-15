<?php

namespace Drupal\dcm_sessions;

/**
 * class SpeakerDataDisplay.
 *
 * @package Drupal\dcm_sessions
 */
class SpeakerDataDisplay {

  /**
   * Call theme function to create user link.
   *
   * @param array $user_data
   *   User data.
   *
   * @return array
   *   Return the details for theme function.
   */
  public function setUserLink($user_data) {
    $render = [
      '#theme' => 'session_speakers',
      '#session_speakers_data' => $user_data,
      '#cache' => [
        'max-age' => 0,
      ],
    ];
    return $render;
  }

}
