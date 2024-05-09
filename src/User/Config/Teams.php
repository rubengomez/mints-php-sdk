<?php

namespace Mints\User\Config;

trait Teams
{
    /**
     * Get team types.
     *
     * @return mixed
     */
    public function getTeamTypes()
    {
        return $this->client->raw('get', '/config/teams/team-types');
    }

    /**
     * Get teams.
     *
     * @return mixed
     */
    public function getTeams()
    {
        return $this->client->raw('get', '/config/teams');
    }

    /**
     * Get team.
     *
     * @param int $id
     * @return mixed
     */
    public function getTeam(int $id)
    {
        return $this->client->raw('get', "/config/teams/{$id}");
    }

    /**
     * Create team.
     *
     * @param array $data
     * @return mixed
     */
    public function createTeam(array $data)
    {
        return $this->client->raw('post', '/config/teams', null, $this->dataTransform($data));
    }

    /**
     * Update team.
     *
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function updateTeam(int $id, array $data)
    {
        return $this->client->raw('put', "/config/teams/{$id}", null, $this->dataTransform($data));
    }
}