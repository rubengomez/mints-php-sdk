<?php
namespace Mints\User\Crm;
trait WorkFlowSteps {

  /**
   * Create workflow step.
   * Create a workflow step with data.
   *
   * Parameters:
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = [
   *     'stepTitle' => 'Step Title',
   *     'workflowId' => 1
   * ];
   * $data = $mintsUser->createWorkflowStep(json_encode($data));
   */
  public function createWorkflowStep($data, $options = null) {
    return $this->client->raw('post', '/crm/steps', $options, $data);
  }

  /**
   * Update workflow step.
   * Update a workflow step info.
   *
   * Parameters:
   * $id (int) -- Workflow step id.
   * $data (array) -- Data to be submitted.
   *
   * Example:
   * $data = [
   *     'stepTitle' => 'Step Title Modified'
   * ];
   * $data = $mintsUser->updateWorkflowStep(23, $data);
   */
  public function updateWorkflowStep($id, $data, $options = null) {
    return $this->client->raw('put', "/crm/steps/{$id}", $options, $data);
  }

  /**
   * Delete workflow step.
   * Delete a workflow step.
   *
   * Parameters:
   * $id (int) -- Workflow step id.
   *
   * Example:
   * $data = $mintsUser->deleteWorkflowStep(51);
   */
  public function deleteWorkflowStep($id) {
    return $this->client->raw('delete', "/crm/steps/{$id}");
  }
}
