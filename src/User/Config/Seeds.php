<?php

namespace Mints\User\Config;

trait Seeds
{
    /**
     * Apply seeds.
     *
     * @param array $data
     * @param bool $async
     * @return mixed
     */
    public function applySeeds(array $data, bool $async = false)
    {
        $url = '/config/seeds';
        $url = $async ? "$url?async" : $url;
        return $this->client->raw('post', $url, null, $data);
    }

    /**
     * Get seed processes.
     *
     * @param array|null $options
     * @return mixed
     */
    public function getSeedProcesses(?array $options = null)
    {
        return $this->client->raw('post', '/config/seed-processes', $options);
    }

    /**
     * Get seed process.
     *
     * @param int $id
     * @param array|null $options
     * @return mixed
     */
    public function getSeedProcess(int $id, ?array $options = null)
    {
        return $this->client->raw('get', "/config/seed-processes/{$id}", $options);
    }
}