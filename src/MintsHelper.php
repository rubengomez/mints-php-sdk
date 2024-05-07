<?php

namespace Mints;

class MintsHelper
{
    /**
     * @param $client
     * @param string $url
     * @param array|null $options
     * @param bool $usePost
     * @return mixed
     */
    public static function getQueryResults($client, string $url, array $options = null, bool $usePost = true)
    {
        if ($usePost) {
            return $client->raw('post', $url . '/query', $options);
        } else {
            return $client->raw('get', $url, $options);
        }
    }
}