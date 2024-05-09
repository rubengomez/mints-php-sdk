<?php

namespace Mints\Contact\Content;

trait ContactConversations
{
    public function getConversations($options = [])
    {
        return $this->client->raw('get', '/content/conversations', $options, null, $this->contactV1Url);
    }

    public function getConversation($id, $options = [])
    {
        return $this->client->raw('get', "/content/conversations/{$id}", $options, null, $this->contactV1Url);
    }

    public function createConversation($data)
    {
        return $this->client->raw('post', '/content/conversations', null, $this->dataTransform($data), $this->contactV1Url);
    }

    public function updateConversation($id, $data)
    {
        return $this->client->raw('put', "/content/conversations/{$id}", null, $this->dataTransform($data), $this->contactV1Url);
    }

    public function updateConversationStatus($id, $data)
    {
        return $this->client->raw('put', "/content/conversations/{$id}/status", null, $this->dataTransform($data), $this->contactV1Url);
    }

    public function getConversationParticipants($id)
    {
        return $this->client->raw('get', "/content/conversations/{$id}/participants", null, null, $this->contactV1Url);
    }

    public function getMessages($options = [])
    {
        return $this->client->raw('get', '/content/messages', $options, null, $this->contactV1Url);
    }

    public function getMessage($id, $options = [])
    {
        return $this->client->raw('get', "/content/messages/{$id}", $options, null, $this->contactV1Url);
    }

    public function createMessage($data)
    {
        return $this->client->raw('post', '/content/messages', null, $this->dataTransform($data), $this->contactV1Url);
    }
}