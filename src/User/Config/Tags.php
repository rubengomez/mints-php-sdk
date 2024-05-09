<?php

namespace Mints\User\Config;

trait Tags
{
    /**
     * Get tags.
     *
     * @return mixed
     */
    public function getTags()
    {
        return $this->client->raw('get', '/config/tags');
    }

    /**
     * Get tag.
     *
     * @param int $id
     * @return mixed
     */
    public function getTag(int $id)
    {
        return $this->client->raw('get', "/config/tags/{$id}");
    }

    /**
     * Create tag.
     *
     * @param array $data
     * @return mixed
     */
    public function createTag(array $data)
    {
        return $this->client->raw('post', '/config/tags', null, $this->dataTransform($data));
    }

    /**
     * Update tag.
     *
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function updateTag(int $id, array $data)
    {
        return $this->client->raw('put', "/config/tags/{$id}", null, $this->dataTransform($data));
    }
}