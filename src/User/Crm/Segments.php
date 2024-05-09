<?php
namespace Mints\User\Crm;
trait Segments {

  /**
   * Get segments support data.
   *
   * Example:
   * $data = $mintsUser->getSegmentsSupportData();
   */
  public function getSegmentsSupportData() {
    return $this->client->raw('get', '/crm/segments/support-data');
  }

  /**
   * Get segments attributes.
   *
   * Parameters:
   * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
   *
   * Example:
   * $options = ['object_type' => 'contacts'];
   * $data = $mintsUser->getSegmentsAttributes($options);
   */
  public function getSegmentsAttributes($options = null) {
    return $this->client->raw('get', '/crm/segments/attributes', $options);
  }

  /**
   * Get segment group.
   *
   * Parameters:
   * $groupId (string) -- Group's name.
   *
   * Example:
   * $data = $mintsUser->getSegmentGroup("users");
   */
  public function getSegmentGroup($groupId) {
    return $this->client->raw('get', "/crm/segments/groups/{$groupId}");
  }

  /**
   * Duplicate segment.
   *
   * Parameters:
   * $id (int) -- Segment id.
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = ['options' => []];
   * $data = $mintsUser->duplicateSegment(107, $data);
   */
  public function duplicateSegment($id, $data) {
    return $this->client->raw('post', "/crm/segments/{$id}/duplicate", null, $data);
  }

  /**
   * Get segments.
   *
   * Parameters:
   * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
   *
   * First Example:
   * $data = $mintsUser->getSegments();
   *
   * Second Example:
   * $options = ['fields' => 'id', 'sort' => '-id'];
   * $data = $mintsUser->getSegments($options);
   */
  public function getSegments($options = null) {
    return $this->client->raw('get', '/crm/segments', $options);
  }

  /**
   * Get segment.
   *
   * Parameters:
   * $id (int) -- Segment id.
   * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
   *
   * First Example:
   * $data = $mintsUser->getSegment(1);
   *
   * Second Example:
   * $options = ['fields' => 'id, title'];
   * $data = $mintsUser->getSegment(1, $options);
   */
  public function getSegment($id, $options = null) {
    return $this->client->raw('get', "/crm/segments/{$id}", $options);
  }

  /**
   * Create segment.
   *
   * Parameters:
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = [
   *     'title' => 'New Segment',
   *     'object_type' => 'deals'
   * ];
   * $data = $mintsUser->createSegment($data);
   */
  public function createSegment($data) {
    return $this->client->raw('post', '/crm/segments', null, $this->dataTransform($data));
  }

  /**
   * Update segment.
   *
   * Parameters:
   * $id (int) -- Segment id.
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = ['title' => 'New Segment Modified'];
   * $data = $mintsUser->updateSegment(118, $data);
   */
  public function updateSegment($id, $data) {
    return $this->client->raw('put', "/crm/segments/{$id}", null, $this->dataTransform($data));
  }

  /**
   * Delete segment.
   *
   * Parameters:
   * $id (int) -- Segment id.
   *
   * Example:
   * $mintsUser->deleteSegment(113);
   */
  public function deleteSegment($id) {
    return $this->client->raw('delete', "/crm/segments/{$id}");
  }
}
