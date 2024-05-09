<?php
namespace Mints\User\Content;
trait ConversationTemplates
{
    /**
     * Get conversation templates.
     * Get a collection of conversation templates.
     *
     * Parameters:
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example
     * $data = $this->getConversations();
     *
     * Second Example
     * $options = ['fields' => 'title'];
     * $data = $this->getConversationTemplates($options);
     */
    public function getConversationTemplates($options = null)
    {
        return $this->client->raw('get', '/content/conversation-templates', $options);
    }

    /**
     * Get conversation template.
     * Get a conversation template info.
     *
     * Parameters:
     * $id (int) -- Conversation id.
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example
     * $data = $this->getConversationTemplate(1);
     *
     * Second Example
     * $options = ['fields' => 'title'];
     * $data = $this->getConversationTemplate(1, $options);
     */
    public function getConversationTemplate($id, $options = null)
    {
        return $this->client->raw('get', "/content/conversation-templates/{$id}", $options);
    }

    /**
     * Create conversation template.
     * Create a conversation template with data.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example
     * $data = [
     *     'title' => 'New Conversation Template',
     *     'slug' => 'new-conversation-template'
     * ];
     * $this->createConversationTemplate($data);
     */
    public function createConversationTemplate($data)
    {
        return $this->client->raw('post', '/content/conversation-templates', null, $this->dataTransform($data));
    }

    /**
     * Update conversation template.
     * Update a conversation template info.
     *
     * Parameters:
     * $id (int) -- Conversation template id.
     * $data (array) -- Data to be submitted.
     *
     * Example
     * $data = [
     *     'title' => 'Conversation Template',
     *     'slug' => 'conversation-template'
     * ];
     * $this->updateConversationTemplate(13, $data);
     */
    public function updateConversationTemplate($id, $data, $options = null)
    {
        return $this->client->raw('put', "/content/conversation-templates/{$id}", $options, $this->dataTransform($data));
    }

    /**
     * Delete conversation template.
     * Delete a conversation template.
     *
     * Parameters:
     * $id (int) -- Conversation template id.
     *
     * Example
     * $this->deleteConversationTemplate(11);
     */
    public function deleteConversationTemplate($id)
    {
        return $this->client->raw('delete', "/content/conversation-templates/{$id}");
    }

    /**
     * Duplicate conversation template.
     * Duplicate a conversation template.
     *
     * Parameters:
     * $id (int) -- Conversation template id.
     * $data (array) -- Data to be submitted.
     *
     * Example
     * $data = [
     *     'title' => 'Duplicated conversation template'
     * ];
     * $this->duplicateConversationTemplate(13, $data);
     */
    public function duplicateConversationTemplate($id, $data)
    {
        return $this->client->raw('put', "/content/conversation-templates/{$id}/duplicate", null, $this->dataTransform($data));
    }

    /**
     * Update activation words.
     * Update activation words in a conversation template.
     *
     * Parameters:
     * $conversation_template_id (int) -- Conversation template id.
     * $data (array) -- Data to be submitted.
     *
     * Example
     * $data = [
     *     'activationWords' => ['hello', 'world'],
     *     'formId' => 1
     * ];
     * $this->updateActivationWords(13, $data);
     */
    public function updateActivationWords($conversation_template_id, $data)
    {
        $url = "/content/conversation-templates/{$conversation_template_id}/activation-words";
        return $this->client->raw('post', $url, null, $this->dataTransform($data));
    }

    /**
     * Attach form in conversation template.
     * Attach a form in the conversation template.
     *
     * Parameters:
     * $id (int) -- Conversation template id.
     * $data (array) -- Data to be submitted.
     *
     * Example
     * $data = [
     *     'form_id' => 2
     * ];
     * $this->attachFormInConversationTemplate(13, $data);
     */
    public function attachFormInConversationTemplate($id, $data)
    {
        return $this->client->raw('post', "/content/conversation-templates/{$id}/attach-form", null, $this->dataTransform($data));
    }

    /**
     * Detach form in conversation template.
     * Detach a form in a conversation template.
     *
     * Parameters:
     * $id (int) -- Conversation template id.
     * $form_id (int) -- Form id.
     *
     * Example
     * $this->detachFormInConversationTemplate(conversation_id, form_id);
     */
    public function detachFormInConversationTemplate($id, $form_id)
    {
        return $this->client->raw('delete', "/content/conversation-templates/{$id}/detach-form/{$form_id}");
    }
}