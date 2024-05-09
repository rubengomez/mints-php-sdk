<?php
namespace Mints\User\Marketing;
trait Marketing {
    ##
    # == Automation
    #

    # === Get automations.
    # Get a collection of automations.
    #
    # ==== Parameters
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     @data = @mints_user->get_automations();
    #
    # ==== Second Example
    #       options = {
    #         fields: 'title'
    #       }
    #       @data = @mints_user->get_automations($options);
    public function getAutomations($options = null) {
        return $this->client->raw('get', '/marketing/automation', $options);
    }

    # === Get automation.
    # Get an automation info.
    #
    # ==== Parameters
    # id:: (Integer) -- Automation id.
    # options:: (Hash) -- List of Resource Collection Options shown above can be used as parameter.
    #
    # ==== First Example
    #     @data = @mints_user->get_automation(1);
    #
    # ==== Second Example
    #     options = {
    #       fields: 'title, id'
    #     }
    #     @data = @mints_user->get_automation(1, $options);
    public function getAutomation($id, $options = null) {
        return $this->client->raw('get', "/marketing/automation/{$id}", $options);
    }

    # === Create automation.
    # Create an automation with data.
    #
    # ==== Parameters
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     data = {
    #       title: 'New Automation'
    #     }
    #     @data = @mints_user->create_automation($data);
    public function createAutomation($data) {
        return $this->client->raw('post', '/marketing/automation/', null, $data);
    }

    # === Update automation.
    # Update an automation info.
    #
    # ==== Parameters
    # id:: (Integer) -- Automation id.
    # data:: (Hash) -- Data to be submitted.
    #
    public function updateAutomation($id, $data) {
        // FIXME: Method doesn't work.
        return $this->client->raw('put', "/marketing/automation/{$id}", null, $data);
    }

    # === Delete automation.
    # Delete an automation.
    #
    # ==== Parameters
    # id:: (Integer) -- Automation id.
    #
    # ==== Example
    #     @data = @mints_user->delete_automation(5);
    public function deleteAutomation($id) {
        return $this->client->raw('delete', "/marketing/automation/{$id}");
    }

    # === Get automation executions.
    # Get executions of an automation.
    #
    # ==== Parameters
    # id:: (Integer) -- Automation id.
    #
    # ==== Example
    #     @data = @mints_user->get_automation_executions(1);
    public function getAutomationExecutions($id) {
        return $this->client->raw('get', "/marketing/automation/{$id}/executions");
    }

    # === Reset automation.
    # Reset an automation.
    #
    # ==== Parameters
    # id:: (Integer) -- Automation id.
    #
    # ==== Example
    #     @data = @mints_user->reset_automation(1);
    public function resetAutomation($id) {
        return $this->client->raw('post', "/marketing/automation/{$id}/reset");
    }

    # === Duplicate automation.
    # Duplicate an automation.
    #
    # ==== Parameters
    # id:: (Integer) -- Automation id.
    # data:: (Hash) -- Data to be submitted.
    #
    # ==== Example
    #     data = {
    #       options: []
    #     }
    #     @data = @mints_user->duplicate_automation(1, json_encode($data));
    public function duplicateAutomation($id, $data) {
        return $this->client->raw('post', "/marketing/automation/{$id}/duplicate", null, $data);
    }
}