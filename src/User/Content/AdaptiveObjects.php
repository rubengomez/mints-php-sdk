<?php
namespace Mints\User\Content;
use Mints\MintsHelper;

trait AdaptiveObjects {

  /**
   * Duplicate adaptive_object.
   * Duplicate an adaptive_object.
   *
   * Parameters:
   * $id (int) -- Adaptive object id.
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = ['options' => []];
   * $data = $mintsUser->duplicateAdaptiveObject(1, json_encode($data));
   */
  public function duplicateAdaptiveObject($id, $data) {
    return $this->client->raw('post', "/content/adaptive-objects/{$id}/duplicate", null, $data);
  }

  /**
   * Get adaptive_objects.
   * Get a collection of adaptive_objects.
   *
   * Parameters:
   * $options (array|null) -- List of Resource Collection Options shown above can be used as parameter.
   * $use_post (bool) -- Variable to determine if the request is by 'post' or 'get' functions.
   *
   * First Example:
   * $data = $mintsUser->getAdaptiveObjects();
   *
   * Second Example:
   * $options = [
   *     'fields' => 'id, slug'
   * ];
   * $data = $mintsUser->getAdaptiveObjects($options);
   *
   * Third Example:
   * $options = [
   *     'fields' => 'id, slug'
   * ];
   * $data = $mintsUser->getAdaptiveObjects($options, true);
   */
  public function getAdaptiveObjects($options = null, $use_post = true) {
    return MintsHelper::getQueryResults($this->client, '/content/adaptive-objects', $options, $use_post);
  }

  /**
   * Get adaptive_object.
   * Get an adaptive_object info.
   *
   * Parameters:
   * $id (int) -- Adaptive object id.
   * $options (array|null) -- List of Resource Collection Options shown above can be used as parameter.
   *
   * First Example:
   * $data = $mintsUser->getAdaptiveObject(1);
   *
   * Second Example:
   * $options = [
   *     'fields' => 'id, slug'
   * ];
   * $data = $mintsUser->getAdaptiveObject(1, $options);
   */
  public function getAdaptiveObject($id, $options = null) {
    return $this->client->raw('get', "/content/adaptive-objects/{$id}", $options);
  }

  /**
   * Create adaptive_object.
   * Create an adaptive_object with data.
   *
   * Parameters:
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = [
   *     'user_id' => 1,
   *     'slug' => 'new-adaptive_object',
   *     'adaptive_object_template_id' => 1
   * ];
   * $options = ['fields' => 'id,slug'];
   * $data = $mintsUser->createAdaptiveObject($data, $options);
   */
  public function createAdaptiveObject($data, $options = null) {
    return $this->client->raw('post', '/content/adaptive-objects', $options, $this->dataTransform($data));
  }

  /**
   * Update adaptive_object.
   * Update an adaptive_object info.
   *
   * Parameters:
   * $id (int) -- Adaptive object id.
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = [
   *     'user_id' => 1,
   *     'slug' => 'new-adaptive_object'
   * ];
   * $data = $mintsUser->updateAdaptiveObject(5, $data);
   */
  public function updateAdaptiveObject($id, $data, $options = null) {
    return $this->client->raw('put', "/content/adaptive-objects/{$id}", $options, $this->dataTransform($data));
  }

  /**
   * Delete adaptive_object.
   * Delete an adaptive_object.
   *
   * Parameters:
   * $id (int) -- Adaptive object id.
   *
   * Example:
   * $data = $mintsUser->deleteAdaptiveObject(6);
   */
  public function deleteAdaptiveObject($id) {
    return $this->client->raw('delete', "/content/adaptive-objects/{$id}");
  }
}
