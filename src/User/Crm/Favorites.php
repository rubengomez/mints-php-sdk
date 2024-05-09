<?php

namespace Mints\User\Crm;
trait Favorites {

  /**
   * Update multiple favorites.
   *
   * Parameters:
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = [...]; // Specify the data format
   * $data = $mintsUser->updateMultipleFavorites($data);
   */
  public function updateMultipleFavorites($data) {
    return $this->client->raw('put', '/crm/favorites', null, $data);
  }

  /**
   * Get favorites.
   *
   * Parameters:
   * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
   *
   * Example:
   * $options = [...]; // Specify the options format
   * $data = $mintsUser->getFavorites($options);
   */
  public function getFavorites($options = null) {
    return $this->client->raw('get', '/crm/favorites', $options);
  }

  /**
   * Update favorites.
   *
   * Parameters:
   * $id (int) -- Favorite id.
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $id = ...; // Specify the favorite id
   * $data = [...]; // Specify the data format
   * $data = $mintsUser->updateFavorites($id, $data);
   */
  public function updateFavorites($id, $data) {
    return $this->client->raw('put', "/crm/favorites/{$id}", null, $data);
  }
}
