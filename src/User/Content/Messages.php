<?php
namespace Mints\User\Content;
trait Messages
{
    /**
     * Get messages.
     * Get a collection of messages.
     *
     * Parameters:
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example:
     * $data = $this->getMessages();
     *
     * Second Example:
     * $options = ['fields' => "value"];
     * $data = $this->getMessages($options);
     */
    public function getMessages($options = null)
    {
        return $this->client->raw('get', '/content/messages', $options);
    }

    /**
     * Get message.
     * Get a message info.
     *
     * Parameters:
     * $id (int) -- Message id.
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example:
     * $data = $this->getMessage(1);
     *
     * Second Example:
     * $options = ['fields' => "value"];
     * $data = $this->getMessage(1, $options);
     */
    public function getMessage($id, $options = null)
    {
        return $this->client->raw('get', "/content/messages/{$id}", $options);
    }

    /**
     * Create message.
     * Create a message with data.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = [
     *     'type' => 'text',
     *     'conversation_id' => 1,
     *     'sender_type' => 'User',
     *     'sender_id' => 1,
     *     'value' => ['text' => 'Hello']
     * ];
     * $data = $this->createMessage($data);
     */
    public function createMessage($data, $options = null)
    {
        return $this->client->raw('post', '/content/messages', $options, $this->dataTransform($data));
    }

    /**
     * Update message.
     * Update a message info.
     *
     * Parameters:
     * $id (int) -- Message id.
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = ['value' => ['text' => 'Hello World!']];
     * $data = $this->updateMessage(102, $data);
     */
    public function updateMessage($id, $data, $options = null)
    {
        return $this->client->raw('put', "/content/messages/{$id}", $options, $this->dataTransform($data));
    }

    /**
     * Delete message.
     * Delete a message.
     *
     * Parameters:
     * $id (int) -- Message id.
     *
     * Example:
     * $data = $this->deleteMessage(101);
     */
    public function deleteMessage($id)
    {
        return $this->client->raw('delete', "/content/messages/{$id}");
    }
}