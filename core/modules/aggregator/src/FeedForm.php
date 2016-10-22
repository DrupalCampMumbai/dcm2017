<?php

namespace Drupal\aggregator;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Form handler for the aggregator feed edit forms.
 */
class FeedForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $feed = $this->entity;
<<<<<<< HEAD
    $status = $feed->save();
    $label = $feed->label();
    $view_link = $feed->link($label, 'canonical');
    if ($status == SAVED_UPDATED) {
      drupal_set_message($this->t('The feed %feed has been updated.', array('%feed' => $view_link)));
=======
    if ($feed->save() == SAVED_UPDATED) {
      drupal_set_message($this->t('The feed %feed has been updated.', array('%feed' => $feed->label())));
>>>>>>> github/master
      $form_state->setRedirectUrl($feed->urlInfo('canonical'));
    }
    else {
      $this->logger('aggregator')->notice('Feed %feed added.', array('%feed' => $feed->label(), 'link' => $this->l($this->t('View'), new Url('aggregator.admin_overview'))));
<<<<<<< HEAD
      drupal_set_message($this->t('The feed %feed has been added.', array('%feed' => $view_link)));
=======
      drupal_set_message($this->t('The feed %feed has been added.', array('%feed' => $feed->label())));
>>>>>>> github/master
    }
  }

}
