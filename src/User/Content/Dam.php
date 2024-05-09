<?php
namespace Mints\User\Content;
trait DAM
{
    /**
     * Get dam load_tree.
     * Get dam load_tree.
     *
     * Example
     * $data = $this->getDamLoadTree();
     */
    public function getDamLoadTree()
    {
        return $this->client->raw('get', '/content/dam/loadtree');
    }

    /**
     * Get dam asset locations.
     * Get an asset locations in dam.
     *
     * Parameters:
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * Example
     * $data = $this->getDamAssetLocations($options);
     */
    public function getDamAssetLocations($options)
    {
        return $this->client->raw('get', '/content/dam/asset-locations', $options);
    }

    public function pasteDam($data)
    {
        // FIXME: Controller detect object array like a single array.
        return $this->client->raw('post', '/content/dam/paste', null, $data);
    }

    /**
     * Rename dam.
     * Rename folder or asset in dam.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example
     * $data = [
     *     'itemType' => 'asset',
     *     'id' => 21,
     *     'title' => 'New folder title',
     *     'description' => 'New folder description',
     *     'slug' => 'new-folder-title'
     * ];
     * $data = $this->renameDam($data);
     */
    public function renameDam($data)
    {
        return $this->client->raw('post', '/content/dam/rename', null, $data);
    }

    /**
     * Search dam.
     * Search folder or asset in dam.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example
     * $data = [
     *     'searchFor' => 'Folder name'
     * ];
     * $data = $this->searchDam($data);
     */
    public function searchDam($data)
    {
        return $this->client->raw('post', '/content/dam/search', null, $data);
    }

    public function sendToTrashDam($data)
    {
        // FIXME: Invalid argument supplied for foreach()
        return $this->client->raw('post', '/content/dam/sendToTrash', null, $data);
    }

    public function deleteDam($data)
    {
        // FIXME: Invalid argument supplied for foreach()
        return $this->client->raw('post', '/content/dam/delete', null, $data);
    }

    /**
     * Create dam folder.
     * Create a folder in dam.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example
     * $data = [
     *     'folder_name' => 'New Dam Folder',
     *     'slug' => 'new-dam-folder'
     * ];
     * $data = $this->createDamFolder($data);
     */
    public function createDamFolder($data)
    {
        return $this->client->raw('post', '/content/folders/create', null, $data);
    }
}