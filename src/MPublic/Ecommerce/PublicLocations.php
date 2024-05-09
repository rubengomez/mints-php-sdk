<?php

namespace Mints\MPublic\Ecommerce;

use Mints\MintsHelper;

trait PublicLocations
{
    /**
     * Get Locations.
     * Get all locations.
     *
     * @param array|null $options List of Resource collection options shown above can be used as parameter.
     * @param bool $usePost Variable to determine if the request is by 'post' or 'get' functions.
     * @return mixed
     * @throws \Exception
     */
    public function getLocations($options = null, $usePost = true)
    {
        return MintsHelper::getQueryResults($this->client, '/ecommerce/locations', $options, $usePost);
    }
}