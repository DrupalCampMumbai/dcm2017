<?php

namespace Drupal\contact;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Provides an interface defining a contact form entity.
 */
interface ContactFormInterface extends ConfigEntityInterface {

  /**
<<<<<<< HEAD
   * Returns the message to be displayed to user.
   *
   * @return string
   *   A user message.
   */
  public function getMessage();

  /**
=======
>>>>>>> github/master
   * Returns list of recipient email addresses.
   *
   * @return array
   *   List of recipient email addresses.
   */
  public function getRecipients();

  /**
<<<<<<< HEAD
   * Returns the path for redirect.
   *
   * @return string
   *   The redirect path.
   */
  public function getRedirectPath();

  /**
   * Returns the url object for redirect path.
   *
   * Empty redirect property results a url object of front page.
   *
   * @return \Drupal\core\Url
   *   The redirect url object.
   */
  public function getRedirectUrl();

  /**
=======
>>>>>>> github/master
   * Returns an auto-reply message to send to the message author.
   *
   * @return string
   *   An auto-reply message
   */
  public function getReply();

  /**
   * Returns the weight of this category (used for sorting).
   *
   * @return int
   *   The weight of this category.
   */
  public function getWeight();

  /**
<<<<<<< HEAD
   * Sets the message to be displayed to the user.
   *
   * @param string $message
   *   The message to display after form is submitted.
   *
   * @return $this
   */
  public function setMessage($message);

  /**
=======
>>>>>>> github/master
   * Sets list of recipient email addresses.
   *
   * @param array $recipients
   *   The desired list of email addresses of this category.
   *
   * @return $this
   */
  public function setRecipients($recipients);

  /**
<<<<<<< HEAD
   * Sets the redirect path.
   *
   * @param string $redirect
   *   The desired path.
   *
   * @return $this
   */
  public function setRedirectPath($redirect);

  /**
=======
>>>>>>> github/master
   * Sets an auto-reply message to send to the message author.
   *
   * @param string $reply
   *   The desired reply.
   *
   * @return $this
   */
  public function setReply($reply);

  /**
   * Sets the weight.
   *
   * @param int $weight
   *   The desired weight.
   *
   * @return $this
   */
  public function setWeight($weight);

}
