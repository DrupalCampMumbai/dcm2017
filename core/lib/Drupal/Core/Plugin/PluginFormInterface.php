<?php

namespace Drupal\Core\Plugin;

use Drupal\Core\Form\FormStateInterface;

/**
 * Provides an interface for an embeddable plugin form.
 *
<<<<<<< HEAD
 * Plugins can implement this form directly, or a standalone class can be used.
 * Decoupled forms can implement \Drupal\Component\Plugin\PluginAwareInterface
 * in order to gain access to the plugin.
 *
=======
>>>>>>> github/master
 * @ingroup plugin_api
 */
interface PluginFormInterface {

  /**
   * Form constructor.
   *
   * Plugin forms are embedded in other forms. In order to know where the plugin
   * form is located in the parent form, #parents and #array_parents must be
   * known, but these are not available during the initial build phase. In order
   * to have these properties available when building the plugin form's
   * elements, let this method return a form element that has a #process
   * callback and build the rest of the form in the callback. By the time the
   * callback is executed, the element's #parents and #array_parents properties
   * will have been set by the form API. For more documentation on #parents and
   * #array_parents, see \Drupal\Core\Render\Element\FormElement.
   *
   * @param array $form
   *   An associative array containing the initial structure of the plugin form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
<<<<<<< HEAD
   *   The current state of the form. Calling code should pass on a subform
   *   state created through
   *   \Drupal\Core\Form\SubformState::createForSubform().
=======
   *   The current state of the complete form.
>>>>>>> github/master
   *
   * @return array
   *   The form structure.
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state);

  /**
   * Form validation handler.
   *
   * @param array $form
   *   An associative array containing the structure of the plugin form as built
   *   by static::buildConfigurationForm().
   * @param \Drupal\Core\Form\FormStateInterface $form_state
<<<<<<< HEAD
   *   The current state of the form. Calling code should pass on a subform
   *   state created through
   *   \Drupal\Core\Form\SubformState::createForSubform().
=======
   *   The current state of the complete form.
>>>>>>> github/master
   */
  public function validateConfigurationForm(array &$form, FormStateInterface $form_state);

  /**
   * Form submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the plugin form as built
   *   by static::buildConfigurationForm().
   * @param \Drupal\Core\Form\FormStateInterface $form_state
<<<<<<< HEAD
   *   The current state of the form. Calling code should pass on a subform
   *   state created through
   *   \Drupal\Core\Form\SubformState::createForSubform().
=======
   *   The current state of the complete form.
>>>>>>> github/master
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state);

}
