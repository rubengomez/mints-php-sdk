<?php

namespace Mints\User\Config;

trait Relationships
{
    /**
     * Get relationships available for.
     * Get relationships available.
     *
     * Parameters:
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * Example:
     * $options = [
     *     'objectType' => 'contacts'
     * ];
     * $data = $this->getRelationshipsAvailableFor($options);
     */
    public function getRelationshipsAvailableFor($options)
    {
        return $this->client->raw('get', '/config/relationships/available-for', $options);
    }

    /**
     * Attach relationship.
     * Attach a relationship.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * FIXME: Method doesn't work, RelationshipManager cannot access to id attribute.
     * $this->attachRelationship(data_transform($data));
     */
    public function attachRelationship($data)
    {
        return $this->client->raw('post', '/config/relationships/attach', null, $this->dataTransform($data));
    }

    /**
     * Detach relationship.
     * Detach a relationship.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * FIXME: Method doesn't work, RelationshipManager cannot access to id attribute.
     * $this->detachRelationship(data_transform($data));
     */
    public function detachRelationship($data)
    {
        return $this->client->raw('post', '/config/relationships/detach', null, $this->dataTransform($data));
    }

    /**
     * Relationship has objects.
     * Get relationships that has objects.
     *
     * Parameters:
     * $id (int) -- Relationship id.
     *
     * Example:
     * $data = $this->relationshipHasObjects(1);
     */
    public function relationshipHasObjects($id)
    {
        return $this->client->raw('get', "/config/relationships/{$id}/hasObjects");
    }

    /**
     * Get relationships.
     * Get a collection of relationships.
     *
     * Parameters:
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * Example:
     * $data = $this->getRelationships();
     */
    public function getRelationships($options = null)
    {
        return $this->client->raw('get', '/config/relationships', $options);
    }

    /**
     * Get relationship.
     * Get a relationship info.
     *
     * Parameters:
     * $id (int) -- Relationship id.
     * $options (array) -- List of Resource Collection Options shown above can be used as parameter.
     *
     * Example:
     * $data = $this->getRelationship(1);
     */
    public function getRelationship($id, $options = null)
    {
        return $this->client->raw('get', "/config/relationships/{$id}", $options);
    }

    /**
     * Create relationship.
     * Create a relationship with data.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = [
     *     'alias_1' => 'eventsCopy',
     *     'alias_2' => 'ticketsCopy',
     *     'object_model_1' => 'Story',
     *     'object_model_2' => 'Product'
     * ];
     * $data = $this->createRelationship($data);
     */
    public function createRelationship($data)
    {
        return $this->client->raw('post', '/config/relationships', null, $this->dataTransform($data));
    }

    /**
     * Update relationship.
     * Update a relationship info.
     *
     * Parameters:
     * $id (int) -- Relationship id.
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = [
     *     'alias_1' => 'eventsCopyModified',
     *     'alias_2' => 'ticketsCopyModified',
     *     'object_model_1' => 'Story',
     *     'object_model_2' => 'Product'
     * ];
     * $data = $this->updateRelationship(5, $data);
     */
    public function updateRelationship($id, $data)
    {
        return $this->client->raw('put', "/config/relationships/{$id}", null, $this->dataTransform($data));
    }

    /**
     * Delete relationship.
     * Delete a relationship.
     *
     * Parameters:
     * $id (int) -- Relationship id.
     *
     * Example:
     * $data = $this->deleteRelationship(5);
     */
    public function deleteRelationship($id)
    {
        return $this->client->raw('delete', "/config/relationships/{$id}");
    }
}