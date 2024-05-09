<?php
namespace Mints\User\Crm;
trait Workflows {

  /**
   * Get workflows.
   * Get a collection of workflows.
   *
   * Parameters:
   * $options (array|null) -- List of Resource Collection Options shown above can be used as parameter.
   *
   * First Example:
   * $data = $mintsUser->getWorkflows();
   *
   * Second Example:
   * $options = ['sort' => 'title', 'fields' => 'title'];
   * $data = $mintsUser->getWorkflows($options);
   */
  public function getWorkflows($options = null) {
    return $this->client->raw('get', '/crm/workflows', $options);
  }

  /**
   * Get workflow.
   * Get a workflow.
   *
   * Parameters:
   * $id (int) -- Workflow id.
   * $options (array|null) -- List of Resource Collection Options shown above can be used as parameter.
   *
   * First Example:
   * $data = $mintsUser->getWorkflow(1);
   *
   * Second Example:
   * $options = ['fields' => 'id, title'];
   * $data = $mintsUser->getWorkflow(1, $options);
   */
  public function getWorkflow($id, $options = null) {
    return $this->client->raw('get', "/crm/workflows/{$id}", $options);
  }

  /**
   * Create workflow.
   * Create a workflow with data.
   *
   * Parameters:
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = [
   *     'title' => 'New Workflow',
   *     'object_type' => 'deals'
   * ];
   * $data = $mintsUser->createWorkflow(json_encode($data));
   */
  public function createWorkflow($data, $options = null) {
    return $this->client->raw('post', '/crm/workflows/', $options, $data);
  }

  /**
   * Update workflow.
   * Update a workflow info.
   *
   * Parameters:
   * $id (int) -- Workflow id.
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = [
   *     'title' => 'New Workflow Modified'
   * ];
   * $data = $mintsUser->updateWorkflow(7, $data);
   */
  public function updateWorkflow($id, $data, $options = null) {
    return $this->client->raw('put', "/crm/workflows/{$id}", $options, $this->correctJson($data));
  }
}
