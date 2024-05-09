<?php

namespace Mints\User\Config;

trait SystemSettings
{
    /**
     * Get settings by keys.
     *
     * @param array $options
     * @return mixed
     */
    public function getSettingsByKeys(array $options)
    {
        return $this->client->raw('get', '/config/settings/by-keys', $options);
    }

    /**
     * Get settings.
     *
     * @return mixed
     */
    public function getSettings()
    {
        return $this->client->raw('get', '/config/settings');
    }

    /**
     * Create setting.
     *
     * @param array $data
     * @return mixed
     */
    public function createSetting(array $data)
    {
        return $this->client->raw('post', '/config/settings', null, $this->dataTransform($data));
    }

    /**
     * Clear tag.
     *
     * @param int $tag
     * @return mixed
     */
    public function clearTag(int $tag)
    {
        return $this->client->raw('get', "/config/settings/tags/{$tag}/clear");
    }
}