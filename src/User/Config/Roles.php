<?php

namespace Mints\User\Config;

trait Roles
{
    /**
     * Duplicate role.
     * Duplicate a role.
     *
     * Parameters:
     * $id (int) -- Role id.
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = ['options' => ['name' => 'Duplicated role']];
     * $data = $this->duplicateRole(1, $data);
     */
    public function duplicateRole($id, $data)
    {
        return $this->client->raw('post', "/config/roles/{$id}/duplicate", null, $data);
    }

    /**
     * Get roles.
     * Get a collection of roles.
     *
     * Example:
     * $data = $this->getRoles();
     */
    public function getRoles()
    {
        return $this->client->raw('get', '/config/roles');
    }

    /**
     * Get role.
     * Get a role info.
     *
     * Parameters:
     * $id (int) -- Role id.
     *
     * Example:
     * $data = $this->getRole(1);
     */
    public function getRole($id)
    {
        return $this->client->raw('get', "/config/roles/{$id}");
    }

    /**
     * Create role.
     * Create a role with data.
     *
     * Parameters:
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = [
     *     'name' => 'new-role',
     *     'display_name' => 'New Role',
     *     'description' => 'Role description'
     * ];
     * $data = $this->createRole($data);
     */
    public function createRole($data)
    {
        return $this->client->raw('post', '/config/roles', null, $this->dataTransform($data));
    }

    /**
     * Update role.
     * Update a role info.
     *
     * Parameters:
     * $id (int) -- Role id.
     * $data (array) -- Data to be submitted.
     *
     * Example:
     * $data = [
     *     'name' => 'new-role',
     *     'display_name' => 'New Role Display Name Modified',
     *     'description' => 'Role description',
     *     'permissions' => 1
     * ];
     * // FIXME: This action is unauthorized
     * // TODO: Research permissions variable type. This would be the error's solution.
     * $data = $this->updateRole(8, $data);
     */
    public function updateRole($id, $data)
    {
        return $this->client->raw('put', "/config/roles/{$id}", null, $this->dataTransform($data));
    }
}