<?php

namespace Mints\User\Config;

trait PublicFolders
{
    /**
     * Sync public folders for object.
     * Sync public folders for object.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = [
     *     'object_type' => 'contacts',
     *     'object_id' => 1
     * ];
     * $data = $this->syncPublicFoldersForObject(json_encode($data));
     */
    public function syncPublicFoldersForObject($data)
    {
        return $this->client->raw('put', '/config/public-folders/sync_public-folders_for_object', null, $data);
    }

    /**
     * Get public folders for object.
     * Get public folders for object.
     *
     * Parameters:
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * Example:
     * $options = [
     *     'object_type' => 'contacts',
     *     'object_id' => 1
     * ];
     * $data = $this->getPublicFoldersForObject($options);
     */
    public function getPublicFoldersForObject($options)
    {
        return $this->client->raw('get', '/config/public-folders/get_public-folders_for_object', $options);
    }

    /**
     * Get public folders.
     * Get a collection of public folders.
     *
     * Example:
     * $data = $this->getPublicFolders();
     */
    public function getPublicFolders($options = null)
    {
        return $this->client->raw('get', '/config/public-folders', $options);
    }

    /**
     * Create public folder.
     * Create a public folder with data.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = [
     *     'title' => 'New Public Folder',
     *     'slug' => 'new-public-folder',
     *     'object_type' => 'contacts',
     *     'visible' => true
     * ];
     * $data = $this->createPublicFolder(json_encode($data));
     */
    public function createPublicFolder($data)
    {
        return $this->client->raw('post', '/config/public-folders', null, $data);
    }

    /**
     * Update public folder.
     * Update a public folder info.
     *
     * Parameters:
     * $id (int) -- Public folder id.
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = [
     *     'title' => 'New Public Folder Modified',
     *     'slug' => 'new-public-folder',
     *     'object_type' => 'contacts',
     *     'visible' => true
     * ];
     * $data = $this->updatePublicFolder(20, json_encode($data));
     */
    public function updatePublicFolder($id, $data)
    {
        return $this->client->raw('put', "/config/public-folders/{$id}", null, $data);
    }

    /**
     * Get public folder support data.
     * Get support data used in a public folder.
     *
     * Parameters:
     * $id (int) -- Public folder id.
     *
     * Example:
     * $data = $this->getPublicFolderSupportData(1);
     */
    public function getPublicFolderSupportData($id)
    {
        return $this->client->raw('get', "/config/public-folders/support-data/{$id}");
    }

    /**
     * Get public folder.
     * Get a public folder info.
     *
     * Parameters:
     * $id (int) -- Public folder id.
     *
     * Example:
     * $data = $this->getPublicFolder(3);
     */
    public function getPublicFolder($id)
    {
        return $this->client->raw('get', "/config/public-folders/{$id}");
    }
}