<?php
namespace Mints\User\Config;
use Mints\MintsHelper;

trait ApiKeys
{

    /**
     * Get api keys.
     * Get a collection of api keys.
     *
     * Parameters:
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example:
     * $data = $this->getApiKeys();
     *
     * Second Example:
     * $options = ['fields' => 'id'];
     * $data = $this->getApiKeys($options);
     */
    public function getApiKeys($options = null)
    {
        return $this->client->raw('get', '/config/api-keys', $options);
    }

    /**
     * Get api key.
     * Get an api key info.
     *
     * Parameters:
     * $id (int) -- Api key id.
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example:
     * $data = $this->getApiKey(2);
     *
     * Second Example:
     * $options = ['fields' => 'id'];
     * $data = $this->getApiKey(2, $options);
     */
    public function getApiKey($id, $options = null)
    {
        return $this->client->raw('get', "/config/api-keys/{$id}", $options);
    }

    /**
     * Create api key.
     * Create an api key with data.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = ['description' => 'New Api Key Description'];
     * $data = $this->createApiKey($data);
     */
    public function createApiKey($data)
    {
        return $this->client->raw('post', '/config/api-keys', null, $this->dataTransform($data));
    }

    /**
     * Delete api key.
     * Delete an api key.
     *
     * Parameters:
     * $id (int) -- Api key id.
     *
     * Example:
     * $data = $this->deleteApiKey(2);
     */
    public function deleteApiKey($id)
    {
        return $this->client->raw('delete', "/config/api-keys/{$id}");
    }
}