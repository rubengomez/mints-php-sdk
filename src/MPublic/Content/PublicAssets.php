<?php

namespace Mints\MPublic\Content;

use Mints\MintsHelper;

trait PublicAssets
{
    /**
     * Get Asset Info.
     * Get a description of an Asset.
     *
     * @param string $slug It's the string identifier of the asset.
     * @return mixed
     * @throws \Exception
     */
    public function getAssetInfo($slug)
    {
        return $this->client->raw('get', "/content/asset-info/{$slug}");
    }
}