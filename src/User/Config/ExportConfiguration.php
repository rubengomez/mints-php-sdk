<?php

namespace Mints\User\Config;

trait ExportConfiguration
{
    /**
     * Get export_configurations.
     * Get a collection of export_configurations.
     *
     * Parameters:
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * First Example:
     * $data = $this->getExportConfigurations();
     *
     * Second Example:
     * $options = [
     *     'sort' => 'id'
     * ];
     * $data = $this->getExportConfigurations($options);
     */
    public function getExportConfigurations($options = null)
    {
        return $this->client->raw('get', '/config/export-configurations', $options);
    }

    /**
     * Get export.
     * Get an export configuration info.
     *
     * Parameters:
     * $id (int) -- Export configuration id.
     *
     * Example:
     * $data = $this->getExportConfiguration(10);
     */
    public function getExportConfiguration($id)
    {
        return $this->client->raw('get', "/config/export-configurations/{$id}");
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
     *     'title' => 'New configuration',
     *     'slug' => 'new-configuration',
     *     'object_model' => 'Contact',
     *     'config_json' => []
     * ];
     * $data = $this->createExportConfiguration($data);
     */
    public function createExportConfiguration($data)
    {
        return $this->client->raw('post', '/config/export-configurations', null, $this->dataTransform($data));
    }

    /**
     * Update export configuration.
     * Update an export configuration info.
     *
     * Parameters:
     * $id (int) -- Export configuration id.
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = [
     *     'title' => 'New configuration',
     *     'slug' => 'new-configuration',
     *     'object_model' => 'Contact',
     *     'config_json' => []
     * ];
     * $data = $this->updateExportConfiguration(36, $data);
     */
    public function updateExportConfiguration($id, $data)
    {
        return $this->client->raw('put', "/config/export-configurations/{$id}", null, $this->dataTransform($data));
    }
}