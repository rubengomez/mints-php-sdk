<?php
namespace Mints\User\Content;
trait MessageTemplates
{
    /**
     * Get variables of content page from message template.
     * Get variables used in a specified content page located in message templates.
     *
     * Parameters:
     * $id (int) -- Content page id.
     *
     * Example:
     * $data = $this->getVariablesOfContentPageFromMessageTemplates(2);
     */
    public function getVariablesOfContentPageFromMessageTemplates($id)
    {
        return $this->client->raw('get', "/content/message-templates/content-pages/{$id}/variables");
    }

    /**
     * Get recipient variables.
     * Get recipient variables in message templates.
     *
     * Example:
     * $data = $this->getRecipientVariables();
     */
    public function getRecipientVariables()
    {
        return $this->client->raw('get', '/content/message-templates/recipient-variables');
    }

    /**
     * Get driver templates.
     * Get driver templates in message templates.
     *
     * Example:
     * $data = $this->getDriverTemplates();
     */
    public function getDriverTemplates()
    {
        return $this->client->raw('get', '/content/email-templates/driver/templates');
    }

    /**
     * Preview message template.
     * Preview an message template based in data.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $variables = ['variable_1' => 1, 'variable_2' => 'City'];
     * $data = ['body' => "Message Template {{ variable_2 }}", 'variables' => json_encode($variables)];
     * $data = $this->previewMessageTemplate($data);
     */
    public function previewMessageTemplate($data)
    {
        return $this->client->raw('post', '/content/message-templates/preview', null, $this->dataTransform($data));
    }

    /**
     * Send Message Template.
     * Send an message template to different contacts.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = [
     *     'contacts' => [['id' => 10]],
     *     'emailTemplateId' => 1,
     *     'resend' => false
     * ];
     * $data = $this->sendMessageTemplate($data);
     */
    public function sendMessageTemplate($data)
    {
        return $this->client->raw('post', '/content/message-templates/send', null, $this->dataTransform($data));
    }

    /**
     * Duplicate Message Template.
     * Duplicate an message template.
     *
     * Parameters:
     * $id (int) -- Message template id.
     * $data (array) -- Data to be submitted.
     *
     */
    public function duplicateMessageTemplate($id, $data)
    {
        // FIXME: Error in duplicating
        return $this->client->raw('post', "/content/message-templates/{$id}/duplicate", null, $this->dataTransform($data));
    }

    /**
     * Get message templates.
     * Get a collection of message templates.
     *
     * Parameters:
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example:
     * $data = $this->getMessageTemplates();
     *
     * Second Example:
     * $options = ['fields' => 'id'];
     * $data = $this->getMessageTemplates($options);
     */
    public function getMessageTemplates($options = null)
    {
        return $this->client->raw('get', '/content/message-templates', $options);
    }

    /**
     * Get message template.
     * Get an message template info.
     *
     * Parameters:
     * $id (int) -- Message template id.
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example:
     * $data = $this->getMessageTemplate(1);
     *
     * Second Example:
     * $options = ['fields' => 'id'];
     * $data = $this->getMessageTemplate(1, $options);
     */
    public function getMessageTemplate($id, $options = null)
    {
        return $this->client->raw('get', "/content/message-templates/{$id}", $options);
    }

    /**
     * Create message template.
     * Create an message template with data.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = ['title' => 'New Message Template', 'slug' => 'new-message-template'];
     * $data = $this->createMessageTemplate($data);
     */
    public function createMessageTemplate($data)
    {
        return $this->client->raw('post', '/content/message-templates', null, $this->dataTransform($data));
    }

    /**
     * Update message template.
     * Update an message template info.
     *
     * Parameters:
     * $id (int) -- Message template id.
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = ['title' => "New Message Template Modified"];
     * $data = $this->updateMessageTemplate(5, $data);
     */
    public function updateMessageTemplate($id, $data)
    {
        return $this->client->raw('put', "/content/message-templates/{$id}", null, $this->dataTransform($data));
    }

    /**
     * Delete message template.
     * Delete an message template.
     *
     * Parameters:
     * $id (int) -- Message template id.
     *
     * Example:
     * $data = $this->deleteMessageTemplate(2);
     */
    public function deleteMessageTemplate($id)
    {
        return $this->client->raw('delete', "/content/message-templates/{$id}");
    }
}