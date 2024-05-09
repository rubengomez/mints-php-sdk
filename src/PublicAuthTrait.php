<?php

namespace Mints;

trait PublicAuthTrait
{
    public mPublic $mintsPublic;

    public function initializePublicClient($host = null, $apiKey = null, $sessionToken = null, $debug = false, $timeouts = []): void
    {
        $this->mintsPublic = new mPublic($host, $apiKey, $sessionToken, $debug, $timeouts);
    }
}