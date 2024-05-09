<?php
namespace Mints\User\Content;
trait Conversations
{
    /**
     * Get conversations.
     * Get a collection of conversations.
     *
     * Parameters:
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example
     * $data = $this->getConversations();
     *
     * Second Example
     * $options = ['fields' => 'title'];
     * $data = $this->getConversations($options);
     */
    public function getConversations($options = null)
    {
        return $this->client->raw('get', '/content/conversations', $options);
    }

    /**
     * Get conversation.
     * Get a conversation info.
     *
     * Parameters:
     * $id (int) -- Conversation id.
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example
     * $data = $this->getConversation(1);
     *
     * Second Example
     * $options = ['fields' => 'title'];
     * $data = $this->getConversation(1, $options);
     */
    public function getConversation($id, $options = null)
    {
        return $this->client->raw('get', "/content/conversations/{$id}", $options);
    }

    /**
     * Create conversation.
     * Create a conversation with data.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example
     * $data = [
     *     'title' => 'New Conversation'
     * ];
     * $this->createConversation($data);
     */
    public function createConversation($data, $options = null)
    {
        return $this->client->raw('post', '/content/conversations', $options, $this->dataTransform($data));
    }

    /**
     * Update conversation.
     * Update a conversation info.
     *
     * Parameters:
     * $id (int) -- Conversation id.
     * $data (array) -- Data to be submitted.
     *
     * Example
     * $data = [
     *     'title' => 'New Conversation Modified'
     * ];
     * $this->updateConversation(13, $data);
     */
    public function updateConversation($id, $data, $options = null)
    {
        return $this->client->raw('put', "/content/conversations/{$id}", $options, $this->dataTransform($data));
    }

    /**
     * Delete conversation.
     * Delete a conversation.
     *
     * Parameters:
     * $id (int) -- Conversation id.
     *
     * Example
     * $this->deleteConversation(11);
     */
    public function deleteConversation($id)
    {
        return $this->client->raw('delete', "/content/conversations/{$id}");
    }

    /**
     * Update conversation status.
     * Update a conversation status.
     *
     * Parameters:
     * $id (int) -- Conversation id.
     * $data (array) -- Data to be submitted.
     *
     * Example
     * $data = [
     *     'status' => 'read'
     * ];
     * $this->updateConversationStatus(13, $data);
     */
    public function updateConversationStatus($id, $data)
    {
        return $this->client->raw('put', "/content/conversations/{$id}/status", null, $this->dataTransform($data));
    }

    /**
     * Get conversation participants.
     * Get participants in a conversation.
     *
     * Parameters:
     * $id (int) -- Conversation id.
     *
     * Example
     * $data = $this->getConversationParticipants(1);
     */
    public function getConversationParticipants($id)
    {
        return $this->client->raw('get', "/content/conversations/{$id}/participants");
    }

    /**
     * Attach user in conversation.
     * Attach an user in a conversation.
     *
     * Parameters:
     * $id (int) -- Conversation id.
     * $data (array) -- Data to be submitted.
     *
     * Example
     * $data = [
     *     'user_id' => 2
     * ];
     * $this->attachUserInConversation(13, $data);
     */
    public function attachUserInConversation($id, $data)
    {
        return $this->client->raw('post', "/content/conversations/{$id}/attach-user", null, $this->dataTransform($data));
    }

    /**
     * Detach user in conversation.
     * Detach an user in a conversation.
     *
     * Parameters:
     * $id (int) -- Conversation id.
     * $data (array) -- Data to be submitted.
     *
     * Example
     * $data = [
     *     'user_id' => 2
     * ];
     * $this->detachUserInConversation(13, $data);
     */
    public function detachUserInConversation($id, $data)
    {
        return $this->client->raw('post', "/content/conversations/{$id}/detach-user", null, $this->dataTransform($data));
    }

    /**
     * Attach contact in conversation.
     * Attach a contact in a conversation.
     *
     * Parameters:
     * $id (int) -- Conversation id.
     * $data (array) -- Data to be submitted.
     *
     * Example
     * $data = [
     *     'contact_id' => 2
     * ];
     * $this->attachContactInConversation(1, $data);
     */
    public function attachContactInConversation($id, $data)
    {
        return $this->client->raw('post', "/content/conversations/{$id}/attach-contact", null, $this->dataTransform($data));
    }

    /**
     * Detach contact in conversation.
     * Detach a contact in a conversation.
     *
     * Parameters:
     * $id (int) -- Contact id.
     * $data (array) -- Data to be submitted.
     *
     * Example
     * $data = [
     *     'contact_id' => 2
     * ];
     * $this->detachContactInConversation(1, $data);
     */
    public function detachContactInConversation($id, $data)
    {
        return $this->client->raw('post', "/content/conversations/{$id}/detach-contact", null, $this->dataTransform($data));
    }
}