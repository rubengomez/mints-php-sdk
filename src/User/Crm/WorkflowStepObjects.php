<?php
namespace Mints\User\Crm;
trait WorkflowStepObjects {

  /**
   * Get workflow step objects.
   * Get a collection of workflow step objects.
   *
   * Parameters:
   * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
   *
   * First Example:
   * $data = $mintsUser->getStepObjects();
   *
   * Second Example:
   * $options = ['fields' => 'id'];
   * $data = $mintsUser->getStepObjects($options);
   */
  public function getStepObjects($options = null) {
    return $this->client->raw('get', '/crm/step-objects', $options);
  }

  /**
   * Get workflow step object.
   * Get a workflow step object info.
   *
   * Parameters:
   * $id (int) -- Workflow step object id.
   * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
   *
   * First Example:
   * $data = $mintsUser->getStepObject(1);
   *
   * Second Example:
   * $options = ['fields' => 'id, step_id'];
   * $data = $mintsUser->getStepObject(1, $options);
   */
  public function getStepObject($id, $options = null) {
    return $this->client->raw('get', "/crm/step-objects/{$id}", $options);
  }

  /**
   * Create workflow step object.
   * Create a workflow step object with data.
   *
   * Parameters:
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = [
   *     'objectType' => 'deals',
   *     'stepId' => 9,
   *     'objectId' => 1
   * ];
   * $data = $mintsUser->createStepObject($data);
   */
  public function createStepObject($data) {
    return $this->client->raw('post', '/crm/step-objects/', null, $this->dataTransform($data));
  }

  /**
   * Update workflow step object.
   * Update a workflow step object info.
   *
   * Parameters:
   * $id (int) -- Workflow step object id.
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = [
   *     'stepId' => 10
   * ];
   * $data = $mintsUser->updateStepObject(128, $data);
   */
  public function updateStepObject($id, $data) {
    return $this->client->raw('put', "/crm/step-objects/{$id}", null, $data);
  }

  /**
   * Get workflow step object by object type.
   * Get a workflow step object info by an object type.
   *
   * Parameters:
   * $object_type (string) -- Object type.
   * $object_id (int) -- Workflow step object id.
   * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
   *
   * First Example:
   * $data = $mintsUser->getStepObjectByObjectType("deals", 1);
   *
   * Second Example:
   * $options = ['fields' => 'id, object_id'];
   * $data = $mintsUser->getStepObjectByObjectType('deals', 1, $options);
   */
  public function getStepObjectByObjectType($object_type, $object_id, $options = null) {
    return $this->client->raw('get', "/crm/step-objects/{$object_type}/{$object_id}", $options);
  }
}
