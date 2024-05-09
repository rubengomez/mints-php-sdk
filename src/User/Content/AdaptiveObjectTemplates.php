<?php
namespace Mints\User\Content;
use Mints\MintsHelper;

trait AdaptiveObjectTemplates {

  /**
   * Get adaptive_object_templates.
   * Get a collection of adaptive_object_templates.
   *
   * Parameters:
   * $options (array|null) -- List of Resource Collection Options shown above can be used as parameter.
   * $use_post (bool) -- Variable to determine if the request is by 'post' or 'get' functions.
   *
   * First Example:
   * $data = $mintsUser->getAdaptiveObjectTemplates();
   *
   * Second Example:
   * $options = [
   *     'fields' => 'id, slug'
   * ];
   * $data = $mintsUser->getAdaptiveObjectTemplates($options);
   *
   * Third Example:
   * $options = [
   *     'fields' => 'id, slug'
   * ];
   * $data = $mintsUser->getAdaptiveObjectTemplates($options, true);
   */
  public function getAdaptiveObjectTemplates($options = null, $use_post = true) {
    return MintsHelper::getQueryResults($this->client, '/content/adaptive-object-templates', $options, $use_post);
  }

  /**
   * Get adaptive_object_template.
   * Get an adaptive_object_template info.
   *
   * Parameters:
   * $id (int) -- Adaptive object id.
   * $options (array|null) -- List of Resource Collection Options shown above can be used as parameter.
   *
   * First Example:
   * $data = $mintsUser->getAdaptiveObjectTemplate(1);
   *
   * Second Example:
   * $options = [
   *     'fields' => 'id, slug'
   * ];
   * $data = $mintsUser->getAdaptiveObjectTemplate(1, $options);
   */
  public function getAdaptiveObjectTemplate($id, $options = null) {
    return $this->client->raw('get', "/content/adaptive-object-templates/{$id}", $options);
  }

  /**
   * Create adaptive_object_template.
   * Create an adaptive_object_template with data.
   *
   * Parameters:
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = [
   *     'user_id' => 1,
   *     'slug' => 'new-adaptive_object_template',
   *     'adaptive_object_template_template_id' => 1
   * ];
   * $options = ['fields' => 'id,slug'];
   * $data = $mintsUser->createAdaptiveObjectTemplate($data, $options);
   */
  public function createAdaptiveObjectTemplate($data, $options = null) {
    return $this->client->raw('post', '/content/adaptive-object-templates', $options, $this->dataTransform($data));
  }

  /**
   * Update adaptive_object_template.
   * Update an adaptive_object_template info.
   *
   * Parameters:
   * $id (int) -- Adaptive object id.
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = [
   *     'user_id' => 1,
   *     'slug' => 'new-adaptive_object_template'
   * ];
   * $data = $mintsUser->updateAdaptiveObjectTemplate(5, $data);
   */
  public function updateAdaptiveObjectTemplate($id, $data, $options = null) {
    return $this->client->raw('put', "/content/adaptive-object-templates/{$id}", $options, $this->dataTransform($data));
  }

  /**
   * Delete adaptive_object_template.
   * Delete an adaptive_object_template.
   *
   * Parameters:
   * $id (int) -- Adaptive object id.
   *
   * Example:
   * $data = $mintsUser->deleteAdaptiveObjectTemplate(6);
   */
  public function deleteAdaptiveObjectTemplate($id) {
    return $this->client->raw('delete', "/content/adaptive-object-templates/{$id}");
  }
}
