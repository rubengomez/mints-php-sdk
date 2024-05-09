<?php

namespace Mints\MPublic\Config;

use Mints\MintsHelper;

trait PublicTaxonomies
{
    /**
     * Get taxonomies.
     * Get a collection of taxonomies.
     *
     * @param array|null $options  List of Resource collection Options shown above can be used as parameter.
     * @param bool       $use_post Variable to determine if the request is by 'post' or 'get' functions.
     *
     * @return mixed
     */
    public function getTaxonomies($options = null, $use_post = true)
    {
        return MintsHelper::getQueryResults($this->client, '/config/taxonomies', $options, $use_post);
    }

    /**
     * Get taxonomy.
     * Get a single taxonomy.
     *
     * @param string     $slug    It's the string identifier generated by Mints.
     * @param array|null $options List of Single Resource Options shown above can be used as parameter.
     *
     * @return mixed
     */
    public function getTaxonomy($slug, $options = null)
    {
        return $this->client->raw('get', "/config/taxonomies/{$slug}", $options);
    }
}