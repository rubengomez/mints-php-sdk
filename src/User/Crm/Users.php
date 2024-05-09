<?php
namespace Mints\User\Crm;
trait Users {

  /**
   * Get CRM users.
   *
   * Parameters:
   * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
   *
   * First Example:
   * $data = $mintsUser->getCrmUsers();
   *
   * Second Example:
   * $options = ['sort' => 'id', 'fields' => 'id, email'];
   * $data = $mintsUser->getCrmUsers($options);
   */
  public function getCrmUsers($options = null) {
    return $this->client->raw('get', '/crm/users', $options);
  }
}
