<?php

namespace Mints;

trait UserAuthTrait
{
    public User $mintsUser;

    public function initializeUserClient($host = null, $apiKey = null, $sessionToken = null, $debug = false, $timeouts = []): void
    {
        // Check if mints_session_token cookie exists, then set session token from cookie
        if (isset($_COOKIE['mints_user_session_token'])) {
            $sessionToken = $_COOKIE['mints_user_session_token'];
        }
        $this->mintsUser = new User($host, $apiKey, $sessionToken, $debug, $timeouts);
    }

    /**
     * @param string $email
     * @param string $password
     * @return User
     * @throws \Exception
     */
    public function mintsUserLogin(string $email, string $password)
    {
        // Check if mintsUser is not initialized, then initialize it
        if (!isset($this->mintsUser)) $this->initializeClient();
        $response = $this->mintsUser->login($email, $password);
        // Verify if api_token key exists in response
        if (!isset($response['api_token'])) {
            throw new \Exception('Invalid credentials');
        }
        // Set session token from api_token key response
        $this->mintsUser->client->setSessionToken($response['api_token']);
        // Set a cookie called mints_user_session_token with the api_token key response that expires in 1 day
        setcookie('mints_user_session_token', $response['api_token'], time() + 86400, '/');
    }

    /**
     * @return void
     */
    public function mintsUserLogout(): void
    {
        // Unset the cookie called mints_user_session_token
        setcookie('mints_user_session_token', '', time() - 3600, '/');
    }

    /**
     * @throws \Exception
     */
    public function mintsUserMagicLink(string $token): void
    {
        if (!$this->mintsUser) $this->initializeClient();
        $response = $this->mintsUser->magicLinkLogin($token);
        // Verify if api_token key exists in response
        if (!isset($response['api_token'])) {
            throw new \Exception('Invalid token');
        }
        // Set session token from api_token key response
        $this->mintsUser->client->setSessionToken($response['api_token']);
        // Set a cookie called mints_user_session_token with the api_token key response that expires in 1 day
        setcookie('mints_user_session_token', $response['api_token'], time() + 86400, '/');
    }

    /**
     * @return bool
     */
    public function mintsUserSignedIn(): bool
    {
        // Check if mints_user_session_token cookie exists
        return isset($_COOKIE['mints_user_session_token']);
    }
}