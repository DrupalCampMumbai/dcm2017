<?php

namespace Drupal\Core\Authentication;

use Symfony\Component\HttpFoundation\Request;

/**
 * Interface for authentication providers.
 */
interface AuthenticationProviderInterface {

  /**
   * Checks whether suitable authentication credentials are on the request.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The request object.
   *
   * @return bool
   *   TRUE if authentication credentials suitable for this provider are on the
   *   request, FALSE otherwise.
   */
  public function applies(Request $request);

  /**
   * Authenticates the user.
   *
<<<<<<< HEAD
   * @param \Symfony\Component\HttpFoundation\Request|null $request
   *   The request object.
   *
   * @return \Drupal\Core\Session\AccountInterface|null
=======
   * @param \Symfony\Component\HttpFoundation\Request|NULL $request
   *   The request object.
   *
   * @return \Drupal\Core\Session\AccountInterface|NULL
>>>>>>> github/master
   *   AccountInterface - in case of a successful authentication.
   *   NULL - in case where authentication failed.
   */
  public function authenticate(Request $request);

}
