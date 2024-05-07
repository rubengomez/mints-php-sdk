<?php

namespace Mints;

use Mints\User\Contacts;

class User
{
    use Contacts;
    public $client;

    /**
     * @param $host
     * @param $apiKey
     * @param $sessionToken
     * @param $debug
     * @param $timeouts
     */
    public function __construct($host = null, $apiKey = null, $sessionToken = null, $debug = false, $timeouts = [])
    {
        $this->client = new Client(
            $host ?? $_ENV['MINTS_HOST'] ?? null,
            $apiKey ?? $_ENV['MINTS_API_KEY'] ?? null,
            'user',
            $sessionToken,
            null,
            null,
            $debug,
            $timeouts
        );
    }

    /**
     * @param $email
     * @param $password
     * @return mixed
     * @throws \Exception
     */
    public function login($email, $password)
    {
        return $this->client->raw('post', '/users/login', null, [
            'email' => $email,
            'password' => $password
        ], '/api/v1', ['no_content_type' => true]);
    }

    /**
     * @param string $token
     * @return mixed
     * @throws \Exception
     */
    public function magicLinkLogin(string $token)
    {
        return $this->client->raw('get', "/users/magic-link-login/${token}", null, null, '/api/v1');
    }

    /**
     * @param string $email
     * @param string $redirectUrl
     * @param int $lifeTime
     * @return mixed
     * @throws \Exception
     */
    public function sendMagicLink(string $email, string $redirectUrl = '', int $lifeTime = 24)
    {
        return $this->client->raw('post', '/users/send-magic-link', null, [
            'email' => $email,
            'redirectUrl' => $redirectUrl,
            'lifeTime' => $lifeTime
        ], '/api/v1');
    }
}
