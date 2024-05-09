<?php

namespace Mints\MPublic\Config;

trait PublicAttributes
{
    /**
     * Get attributes.
     * Get a collection of attributes.
     *
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->client->raw('get', '/config/attributes');
    }
}