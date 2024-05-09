<?php

namespace Mints\User\Config;

trait Exports
{
    /**
     * Get exports.
     * Get a collection of exports.
     *
     * Parameters:
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example:
     * $data = $this->getExports();
     *
     * Second Example:
     * $options = [
     *     'sort' => 'id'
     * ];
     * $data = $this->getExports($options);
     */
    public function getExports($options = null)
    {
        return $this->client->raw('get', '/config/exports', $options);
    }

    /**
     * Get export.
     * Get an export info.
     *
     * Parameters:
     * $id (int) -- Export id.
     *
     * Example:
     * $data = $this->getExport(10);
     */
    public function getExport($id)
    {
        return $this->client->raw('get', "/config/exports/{$id}");
    }

    /**
     * Create export.
     * Create an export with data.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = [
     *     'title' => 'New export',
     *     'slug' => 'new-export',
     *     'object_type' => 'contacts'
     * ];
     * $data = $this->createExport($data);
     */
    public function createExport($data)
    {
        return $this->client->raw('post', '/config/exports', null, $this->dataTransform($data));
    }

    /**
     * Update export.
     * Update an export info.
     *
     * Parameters:
     * $id (int) -- Export id.
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = [
     *     'title' => 'New export',
     *     'slug' => 'new-export',
     *     'object_type' => 'contacts'
     * ];
     * $data = $this->updateExport(36, $data);
     */
    public function updateExport($id, $data)
    {
        return $this->client->raw('put', "/config/exports/{$id}", null, $this->dataTransform($data));
    }
}